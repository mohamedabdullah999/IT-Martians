<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductManager
{
    protected $cachKey = 'active_products';

    public function getAdminProducts($perPage = 10)
    {
        return Product::latest()->paginate($perPage);
    }

    public function getFrontendProducts()
    {
        return cache()->rememberForever($this->cachKey, function () {
            return Product::latest()->get();
        });
    }

    public function createProduct(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $path = $data['image']->store('products', 'public');
            $data['image'] = 'storage/'.$path;
        }

        $product = Product::create($data);
        Cache::forget($this->cachKey);

        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            if ($product->image && str_starts_with($product->image, 'storage/')) {
                $oldPath = str_replace('storage/', '', $product->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $data['image']->store('products', 'public');
            $data['image'] = 'storage/'.$path;
        } else {
            unset($data['image']);
        }
        $product->update($data);
        Cache::forget($this->cachKey);

        return $product;
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image && str_starts_with($product->image, 'storage/')) {
            $oldPath = str_replace('storage/', '', $product->image);
            Storage::disk('public')->delete($oldPath);
        }

        $product->delete();
        Cache::forget($this->cachKey);
    }
}
