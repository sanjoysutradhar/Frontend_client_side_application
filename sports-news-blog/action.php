<?php
require_once 'vendor\autoload.php';

use App\classes\Blog;
use App\classes\Category;


$result="";

if(isset($_GET["page"])){
    if($_GET["page"]=="home"){
        $category=new Category();
        $cricketCat_id=$category->getCategoryByCricket();
        $footballCat_id=$category->getCategoryByFootball();
        $blog= new Blog();
        $cricketBlogs=$blog->getAllBlogByCricket($cricketCat_id);
        $footballBlogs=$blog->getAllBlogByFootball($footballCat_id);
        $recentBlogs=$blog->getAllBlogByRecent();
        include 'pages/home.php';
    }
    elseif($_GET["page"]=="cricket"){
        include 'pages/cricket.php';
    }
    elseif($_GET["page"]=="football"){
        include 'pages/football.php';
    }
    elseif($_GET["page"]=="news-details"){
        $id=$_GET['id'];
        $blog=new Blog();
        $singleBlog=$blog->getBlogById($id);
        include 'pages/news-details.php';
    }
    elseif($_GET["page"]=="about-us"){
        include 'pages/about-us.php';
    }
    elseif($_GET["page"]=="contact-us"){
        include 'pages/contact-us.php';
    }
}
elseif(isset($_GET["admin"])){
    if($_GET["admin"]=="home"){
        include 'pages/admin/home.php';
    }
    elseif($_GET["admin"]=="category-index"){
        $category=new Category();
        $categories=$category->getAllCategory();
        include 'pages/admin/category-index.php';
    }
    elseif($_GET["admin"]=="category-create"){
        include 'pages/admin/category-create.php';
    }
    elseif($_GET["admin"]=="category-edit"){
        $id=$_GET['cat_id'];
        $category=new Category();
        $singleCategory=$category->getCategoryById($id);
        include 'pages/admin/category-edit.php';
    }
    elseif($_GET["admin"]=="category-delete"){
        $id=$_GET['delete_id'];
        $category=new Category();
        $category->deleteCategoryById($id);
    }
    elseif($_GET["admin"]=="sports-blog-index"){
        $blog=new Blog();
        $blogs=$blog->getAllBlog();
        include 'pages/admin/sports-blog-index.php';
    }
    elseif($_GET["admin"]=="sports-blog-create"){
        $category=new Category();
        $categories=$category->getAllCategoryByStatus();
        include 'pages/admin/sports-blog-create.php';
    }
    elseif($_GET["admin"]=="sports-blog-edit"){
        $id=$_GET['id'];
        $blog=new Blog();
        $singleBlog=$blog->getBlogById($id);
        $category=new Category();
        $categories=$category->getAllCategoryByStatus();
        include 'pages/admin/sports-blog-edit.php';
    }
    elseif($_GET["admin"]=="sports-blog-delete"){
        $id=$_GET['id'];
        $blog=new Blog();
        $blog->deleteBlogById($id);
    }
    
}
elseif(isset($_POST['categoryBtn'])){
    $category=new Category($_POST,$_FILES);
    $result=$category->newCategory();
    include 'pages/admin/category-create.php';
}
elseif(isset($_POST['catUpdateBtn'])){
    $category=new Category($_POST,$_FILES);
    $category->updateCategory();
}
elseif(isset($_POST['sportsBlogBtn'])){
    $blog=new Blog($_POST,$_FILES);
    $result=$blog->newBlog();
    $category=new Category();
    $categories=$category->getAllCategoryByStatus();
    include 'pages/admin/sports-blog-create.php';
}
elseif(isset($_POST['blogUpdateBtn'])){
//    echo "<pre>";
//    print_r($_POST);
//    print_r($_FILES);
//    exit();
    $blog=new Blog($_POST,$_FILES);
    $blog->updateBlog();
}
