<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateFileRequest;
use App\Http\Requests\CertificateInsertRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function certificatesData()
    {
        $certificates = Certificate::all();
        return view('Admin.all_certificates', compact('certificates'));
    }

    public function newFormData()
    {
        return view('Admin.new_certificate');
    }

    public function store(CertificateInsertRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $file = $data['file'];
            unset($data['file']);
            $extension = $file->getClientOriginalExtension();
            $name = Str::uuid();
            $data['file_id'] = $name . '.' . $extension;
            $data['file_name'] = $file->getClientOriginalName();
            Storage::putFileAs('/certificates/', $file, $data['file_id']);

            $this->model->query()->create($data);
            DB::connection()->commit();
        } catch (\Exception $exception) {
            DB::connection()->rollBack();
        }
        return Redirect()->route('all.certificates');

    }

    public function show($id)
    {
        $model = $this->model->query()->find($id);
        return $model ?? response('Not found', 404);
    }

    public function update($id, CertificateUpdateRequest $request)
    {
        $data = $request->all();
        $model = $this->model->query()->find($id);
        if ($model) {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::connection()->commit();

                return $model;
            } catch (\Exception $exception) {
                DB::connection()->rollBack();
                return $exception->getMessage();
            }
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
                if ($model->file_id) {
                    $path = '/certificates/' . $model->file_id;
                    Storage::delete($path);
                }
            }
            $file = $data['file'];
            unset($data['file']);
            $extension = $file->getClientOriginalExtension();
            $name = Str::uuid();
            $data['file_id'] = $name . '.' . $extension;
            $data['file_name'] = $file->getClientOriginalName();
            $model->update($data);
            Storage::putFileAs('/certificates/', $file, $data['file_id']);

            return $model;
        } else
            return response('Not found', 404);
    }

    public function download($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
            if ($model->file_id) {
                $path = '/certificates/' . $model->file_id;
                return Storage::download($path);
            } else
                return response('File not exists', 404);
        } else
            return response('Not found', 404);
    }

    public function destroy($id)
    {
        $model = $this->model->query()->find($id);
        if ($model) {
            $model->delete();
            return Redirect()->route('all.certificates');
        } else
            return response('Not found', 404);
    }
}
