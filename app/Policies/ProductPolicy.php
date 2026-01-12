<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Hanya admin boleh mengelola produk
     */
    public function manage(User $user): bool
    {
        return $user->role === 'admin';
    }
}
