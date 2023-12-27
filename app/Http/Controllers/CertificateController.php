<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateFileRequest;
use App\Http\Requests\CertificateInsertRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    protected $model;

    public function __construct(Certificate $certificate)
    {
        $this->model = $certificate;
    }

    public function index()
    {
        return $this->model->query()->get();
    }

    public function certificates()
    {
        $count = request('count') ?? 10;
        $search = request('search') ?? null;
        $model = $this->model->query();
        if ($search) {
            $model->where('inn', $search)
                ->orWhere('number', $search);
        }
        $model->whereNotNull('file_id');

        $data = $model->inRandomOrder()->limit($count)->get();
        return json_encode($data);
    }

    public function certificatesData()
    {
        $certificates = Certificate::paginate(10)->onEachSide(0);
        return view('Admin.all_certificates', compact('certificates'));
    }

    public function newFormData()
    {
        return view('Admin.new_certificate');
    }

    public function editFormData($id)
    {
        $certificate = $this->model->query()->find($id);
        return view('Admin.edit_certificate', compact('certificate', $certificate));
    }

    public function store(CertificateInsertRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $data['uuid'] = Str::uuid()->toString();
            $this->model->query()->create($data);
            DB::connection()->commit();
        } catch (\Exception $exception) {
            DB::connection()->rollBack();
            return response($exception->getMessage(), 501);
        }
        return Redirect()->route('all.certificates');

    }

    public function show($uuid)
    {
        $certificate = $this->model->query()->where('uuid', $uuid)->first();
        return view('Admin.show_certificate', compact('certificate', $certificate));

//        return $model ?? response('Not found', 404);
    }

    public function edit($id, CertificateUpdateRequest $request)
    {
        $data = $request->all();
        $model = $this->model->query()->find($id);
        if ($model) {
            DB::beginTransaction();
            try {
                if ($model->file_id) {
                    $path = '/public/' . $model->file_id;
                    Storage::delete($path);
                }

                $file = $data['file'];
                unset($data['file']);
                $extension = $file->getClientOriginalExtension();
                $name = Str::uuid();
                $data['file_id'] = $name . '.' . $extension;
                $data['file_name'] = $file->getClientOriginalName();
                $model->update($data);
                Storage::putFileAs('/public/', $file, $data['file_id']);

                $model->update($data);
                DB::connection()->commit();

            } catch (\Exception $exception) {
                DB::connection()->rollBack();
                return response($exception->getMessage(), 501);
            }

            return Redirect()->route('all.certificates');
        } else

            return response('Not found', 404);

    }

    public function upload(CertificateFileRequest $fileRequest)
    {
        $data = $fileRequest->all();
        $model = $this->model->query()->find($data['certificate_id']);
        unset($data['certificate_id']);
        if ($model) {
            if ($model->file_id) {
                $path = '/public/' . $model->file_id;
                Storage::delete($path);
            }
            $file = $data['file'];
            unset($data['file']);
            $extension = $file->getClientOriginalExtension();
            $name = Str::uuid();
            $data['file_id'] = $name . '.' . $extension;
            $data['file_name'] = $file->getClientOriginalName();
            $model->update($data);
            Storage::putFileAs('/public/', $file, $data['file_id']);

            return $model;
        } else
            return response('Not found', 404);
    }

    public function download($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
            if ($model->file_id) {
                $path = '/public/' . $model->file_id;
                return Storage::download($path);
            } else
                return response('File not exists', 404);
        } else
            return response('Not found', 404);
    }
    public function downloadqr($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
            $url = 'http://admin.holding.uz/generate-qrcode/';
            $qrcode = $url . $model->uuid;
            return QrCode::encoding('UTF-8')->format('png')->generate($qrcode);
        } else
            return response('Not found', 404);
    }

    public function checkCertificate($id)
    {
        $model = $this->model->query()->where('uuid', $id)->first();
        if ($model) {
            if ($model->file_id) {
                $path = Storage::url($model->file_id);
                $certificate = $model;
                return view('show_certificate', compact('path', 'certificate'));
            } else
                return response('The certificate file has not been uploaded yet', 404);
        } else
            return response('Certificate not found', 404);


    }

    public function qrcode($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
//            $url = 'http://127.0.0.1:8000/generate-qrcode/';
            $url = 'http://admin.holding.uz/generate-qrcode/';
            $qrcode = $url . $model->uuid;
            return QrCode::format('png')->generate($qrcode);

        } else
            return response('Not found', 404);
    }

    public function destroy($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
            if ($model->file_id) Storage::delete('/public/' . $model->file_id);
            $model->delete();
            return Redirect()->route('all.certificates');
        } else
            return response('Not found', 404);
    }
}
