<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class Products extends BaseController
{
    public function list()
    {
        $produto_model = new ProdutoModel();
        $products = $produto_model->findAll();
    
        $data['products'] = $products;
    
        echo view('templates/header', $data);
        echo view('products/list', $data);
        echo view('templates/footer', $data);
    }

//     public function create(){
//         $dados = $this-> request ->getVar();

//         $produto_model = new ProdutoModel();

//         $produto_model ->insert($dados);
//     }
// }

public function create()
{
    try {
        $dados = [
            'ProductId' => $this->request->getPost('ProductId'),
            'Name'      => $this->request->getPost('Name'),
            'Quantity'  => $this->request->getPost('Quantity'),
            'Amount'     => $this->request->getPost('Amount'),
        ];

        $produto_model = new ProdutoModel();
        $produto_model->insert($dados);

        // Redirect or show success message after successful insertion
        return redirect()->to('products/list');
    } catch (\Exception $e) {
        // Log the error
        log_message('error', $e->getMessage());
        // You can customize the error handling based on your needs
        // For example, redirect back with an error message
        return redirect()->back()->with('error', 'Error occurred while saving data.');
    }
    }

    public function delete($productId)
    {
        $produto_model = new ProdutoModel();

        // Fetch the product by $productId
        $product = $produto_model->find($productId);

        if ($product === null) {
            // Handle case where the product is not found
            return redirect()->to('products/list')->with('error', 'Product not found.');
        }

        // Perform the deletion of the product from the database
        $produto_model->delete($productId);

        // After successful deletion, redirect to the product list page
        return redirect()->to('products/list')->with('success', 'Product deleted successfully.');
    }
    // public function edit($productId)
    // {
    //     $produto_model = new ProdutoModel();

   
    //     $product = $produto_model->find($productId);

    //     if ($product === null) {
         
    //         return redirect()->to('products/list')->with('error', 'Product not found.');
    //     }

    //     // Handle the form submission to update the product
    //     if ($this->request->getMethod() === 'post') {
         
    //         return redirect()->to('products/list')->with('success', 'Product updated successfully.');
    //     }

     
    //     echo view('templates/header');
    //     echo view('products/edit', ['product' => $product]);
    //     echo view('templates/footer');
    // }

    // public function edit($productId)
    // {
    //     $produto_model = new ProdutoModel();

    //     // Fetch the product by $productId
    //     $product = $produto_model->find($productId);

    //     if ($product === null) {
    //         // Handle case where the product is not found
    //         return redirect()->to('products/list')->with('error', 'Product not found.');
    //     }

    //     // Load a form view for editing the product (you need to create this view)
    //     echo view('templates/header');
    //     echo view('products/edit', ['product' => $product]);
    //     echo view('templates/footer');
    // }

    // public function update($productId)
    // {
    //     // Handle the form submission to update the product
    //     if ($this->request->getMethod() === 'post') {
    //         // Validate the form data and update the product in the database
    //         $validatedData = $this->request->getPost();
    //         $produto_model = new ProdutoModel();
    //         $produto_model->update($productId, $validatedData);

    //         // After successful update, redirect to the product list page
    //         return redirect()->to('products/list')->with('success', 'Product updated successfully.');
    //     }
    // }

    public function edit($productId)
    {
        $produto_model = new ProdutoModel();
        $product = $produto_model->find($productId);
    
        $data = [
            'editMode' => true,
            'product' => $product,
        ];
    
        // Load the view with the data
        echo view('templates/header');
        echo view('products/edit', $data);
        echo view('templates/footer');
    }

    // Redirect or show a success message
}


