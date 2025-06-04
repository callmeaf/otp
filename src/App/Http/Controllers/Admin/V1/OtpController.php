<?php

namespace Callmeaf\Otp\App\Http\Controllers\Admin\V1;

use Callmeaf\Base\App\Http\Controllers\Admin\V1\AdminController;
use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;
use Callmeaf\Role\App\Enums\RoleName;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OtpController extends AdminController implements HasMiddleware
{
    public function __construct(protected OtpRepoInterface $otpRepo)
    {
        parent::__construct($this->otpRepo->config);
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'custom_throttle:1,' . app(OtpRepoInterface::class)->config['code_lifetime'], only: ['store']),
            new Middleware(middleware: ['auth:sanctum','role:' . RoleName::SUPER_ADMIN->value],except: ['store']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->otpRepo->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return $this->otpRepo->create(data: $this->request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->otpRepo->findById(value: $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return $this->otpRepo->update(id: $id, data: $this->request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->otpRepo->delete(id: $id);
    }

    public function trashed()
    {
        return $this->otpRepo->trashed();
    }

    public function restore(string $id)
    {
        return $this->otpRepo->restore(id: $id);
    }

    public function forceDestroy(string $id)
    {
        return $this->otpRepo->forceDelete(id: $id);
    }
}
