<?php
namespace Heydari81\Category\Http\Controllers;
use App\Http\Controllers\Controller;
use Heydari81\Course\Http\Requests\CourseStoreRequest;
use Heydari81\Course\Http\Requests\CourseUpdateRequest;
use Heydari81\Category\Models\Category;
use Heydari81\Category\Repositories\CategoryRepo;
use Heydari81\Common\Responses\AjaxResponses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $CategoryRepo;
    public function __construct(CategoryRepo $categoryRepo){
        $this->CategoryRepo=$categoryRepo;

    }

    public function index()
    {
        $this->authorize('category_policy', Category::class);
        $categories = $this->CategoryRepo->all();
        return view('Categories::index',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->authorize('category_policy', Category::class);
        $this->CategoryRepo->store($request);
        return back();
    }

    public function edit($id)
    {
        $this->authorize('category_policy', Category::class);
        $category = $this->CategoryRepo->findById($id);
        $categories = $this->CategoryRepo->allExceptById($id);
        return view('Categories::edit',compact('category','categories'));
    }
    public function update(Request $request, $id){
        $this->authorize('category_policy', Category::class);
        $this->CategoryRepo->update($request,$id);
        return redirect('categories');
    }

    public function destroy($id)
    {
        $this->authorize('category_policy', Category::class);
        $this->CategoryRepo->delete($id);
        AjaxResponses::successResponse();
    }
}
