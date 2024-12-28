<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use Nette\Utils\Random;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home(){
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderby('id', 'DESC')->where('status', 1)->get();
        return view('pages.home', compact('category','genre', 'country', 'category_home', 'phimhot', 'phimhot_sidebar'));
    }
    public function category($slug){

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.category', compact('category','genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar'));
    }
    public function year($year){

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $year = $year;
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        
        $movie = Movie::where('year', $year)->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.year', compact('category','genre', 'country', 'year', 'movie', 'phimhot_sidebar'));
    }
    public function tag($tag){

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $tag = $tag;
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        
        $movie = Movie::where('tags', 'LIKE', '%' .$tag. '%')->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.tag', compact('category','genre', 'country', 'tag', 'movie', 'phimhot_sidebar'));
    }
    public function genre($slug){

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();


        $genre_slug = Genre::where('slug',$slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->orderBy('updated_at', 'DESC')->paginate(40);

        return view('pages.genre', compact('category','genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar'));
    }
    public function country($slug){

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $coutry_slug = Country::where('slug',$slug)->first();
        
        $movie = Movie::where('country_id', $coutry_slug->id)->orderBy('updated_at', 'DESC')->paginate(40);

        return view('pages.country', compact('category','genre', 'country', 'coutry_slug', 'movie', 'phimhot_sidebar'));
    }
    public function movie($slug){
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $movie = Movie::with('country', 'category', 'genre')->where('slug', $slug)->where('status', 1)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->where('slug', '!=',
         $slug)->get();
        return view('pages.movie', compact('category','genre', 'country', 'movie', 'related', 'phimhot_sidebar'));
    }
    public function watch(){
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        return view('pages.watch', compact('category','genre', 'country'));
    }
    public function episode(){
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        return view('pages.episode', compact('category','genre', 'country'));
    }
}
