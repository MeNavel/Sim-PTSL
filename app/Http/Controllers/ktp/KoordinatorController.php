<?php

namespace App\Http\Controllers\ktp;

use App\Http\Controllers\Controller;
use App\Services\KoordinatorServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KoordinatorController extends Controller
{
    public function __construct(
        protected KoordinatorServices $service
    ){

    }

    public function index(Request $request): View|Application|Factory|JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        return $this->service->getAll($request);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('ktp.koordinator.create');
    }

    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return $this->service->getById($id);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        return $this->service->update($id, $request);
    }

    public function store(Request $request)
    {
        return $this->service->create($request);
    }

    public function destroy($id): JsonResponse
    {
        return $this->service->delete($id);
    }
}
