<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;


class PageController extends Controller
{

	public function articles(Request $request)
    {
        return view('articles',[
            'articles' => Article::latest()->wherePublished("1")->paginate(12),
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => '',
            'category' => [],
            'parents' => [],
        ]);
    }


    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();

        $parents = collect();
        $cat = $category;
        while ($cat = $cat->parent) {
            $parents->push($cat);
        }

        return view('category',[
            'category' => $category,
            'articles' => $category->articles()->wherePublished(1)->paginate(12),
            'categories' => Category::with('children')->where('parent_id', $category->id)->get(),
            'parents' => $parents->reverse(),
        ]);
    }


	public function articleShow(Request $request, $slug)
    {
        $article = Article::where('slug','=',$slug)->first();
        $article->update(["viewed"=>++$article->viewed]); 

        $prevarticle = Article::where('id','<',$article->id)->wherePublished("1")->get()->last();
        $nextarticle = Article::where('id','>',$article->id)->wherePublished("1")->first();

        return view('article',[
            'article' => $article,
            'prevarticle'=>$prevarticle,
            'nextarticle'=>$nextarticle
        ]);
    }


    public function tag(Request $request, $tag)
    {

        return view('tag',[
            'articles' => Article::where('meta_keywords','LIKE','%'.$tag.'%')->wherePublished("1")->paginate(12),
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => '',
            'tag' => $tag
        ]);
    }
}
