<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Register\RegisteredSuperAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisteredSuperAdminRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredSuperAdminController extends Controller
{
    public function __construct(protected RegisteredSuperAdminAction $registeredAction)
    {}
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisteredSuperAdminRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->registeredAction->execute($data);
        return redirect(route('dashboard', absolute: false));
    }
}
