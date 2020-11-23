<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Settings;
use App\Comment;
use App\Tickets_type;
use App\PaymentMethod;
use App\Advertising;
use Auth;

class ArticlesController extends Controller
{
     public function index(){
        if(isset($_GET['query'])){
            $query = $_GET['query'];
            $articles = Articles::where('heading','LIKE',"%$query%")
                                  ->orWhere('slug','LIKE','%$query%')
                                  ->where('is_published',1)
                                  ->orderBy('id', 'DESC')->paginate(5);
        }else{
        	$articles = Articles::where('is_published',1)
                              ->where('is_deleted',0)
                              ->orderBy('id', 'DESC')->paginate(5);
        }


        $tickets_type = Tickets_type::where('is_active',1)
                            ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
        $advertisings = Advertising::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        $payment_methods = PaymentMethod::get();

    	  return view('articles.list')
    			  ->with('articles',$articles)
            ->with('tickets_type',$tickets_type)
            ->with('advertisings',$advertisings)
            ->with('payment_methods',$payment_methods);
    }

    public function getArticle($slug){

    	$article = Articles::where('is_published',1)
    				->where('slug',$slug)
    				->first();

        if($article){
            $related_articles = Articles::where('is_published',1)
                            ->where('is_deleted',0)
                            ->where('category_id',$article->category_id)
                            ->where('id','!=',$article->id)
                            ->orderBy('id', 'DESC')->limit(5)->get();

          $advertisings = Advertising::where('is_deleted',0)->orderBy('id', 'DESC')->get();
          $tickets_type = Tickets_type::where('is_active',1)
                              ->where('is_deleted',0)->orderBy('id', 'DESC')->get();
          $payment_methods = PaymentMethod::orderBy('id', 'DESC')->get();

          return view('articles.single')
                    ->with('article',$article)
                    ->with('related_articles',$related_articles)
                    ->with('advertisings',$advertisings)
                    ->with('tickets_type',$tickets_type)
                    ->with('payment_methods',$payment_methods);
        }else{
            return view('errors.404');
        }

    }
}
