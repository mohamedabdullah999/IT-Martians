<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductManager;
use App\Services\SettingManager;

class ProductController extends Controller
{
    public function __construct(protected ProductManager $productManager, protected SettingManager $settingManager) {}

    public function index()
    {
        $products = $this->productManager->getAdminProducts();
        $settings = $this->settingManager->getAllSettings();

        return view('admin.products.index', compact('products', 'settings'));
    }

    public function create()
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.products.create', compact('settings'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productManager->createProduct($request->validated());

        return redirect()->route('admin.products.index')->with('success', 'تم إضافة المنتج بنجاح.');
    }

    public function edit(Product $product)
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.products.edit', compact('product', 'settings'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $settings = $this->settingManager->getAllSettings();
        $this->productManager->updateProduct($product, $request->validated());

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(Product $product)
    {
        $this->productManager->deleteProduct($product);

        return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
