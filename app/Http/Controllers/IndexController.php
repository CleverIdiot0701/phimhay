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
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function search()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
            $genre = Genre::orderby('id', 'DESC')->get();
            $country = Country::orderby('id', 'DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
            $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();



            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'DESC')->paginate(40);
            return view('pages.search', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phim_trailer', 'search'));
        } else {
            return redirect()->to('/');
        }
    }





    public function home()
    {
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $category = Category::orderby('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderby('position', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phimhot', 'phimhot_sidebar', 'phim_trailer' ));
    }
    public function category($slug)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();




        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phim_trailer'));
    }
    public function year($year)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $year = $year;
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();


        $movie = Movie::where('year', $year)->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar', 'phim_trailer'));
    }
    public function tag($tag)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $tag = $tag;
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();


        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('updated_at', 'DESC')->paginate(40);
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar', 'phim_trailer'));
    }
    public function genre($slug)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        // Nhieu the loai
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key => $mov) {
            $many_genre[] = $mov->movie_id;
        }
        $movie = Movie::whereIn('id', $many_genre)->orderBy('updated_at', 'DESC')->paginate(40);

        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar', 'phim_trailer'));
    }
    public function country($slug)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $coutry_slug = Country::where('slug', $slug)->first();

        $movie = Movie::where('country_id', $coutry_slug->id)->orderBy('updated_at', 'DESC')->paginate(40);

        return view('pages.country', compact('category', 'genre', 'country', 'coutry_slug', 'movie', 'phimhot_sidebar', 'phim_trailer'));
    }
    public function movie($slug)
    {
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        $movie = Movie::with('country', 'category', 'genre', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();

        // $movies_single =   Movie::where('thuocphim', 0)->get();
        // $movies_series = Movie::where('thuocphim', 1)->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->where(
            'slug',
            '!=',
            $slug
        )->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->first();
        //lấy ra số tập đã thêm
        $episode_current_list =  Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        return view('pages.movie', compact('category','movies_series', 'movies_single', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'phim_trailer', 'episode', 'episode_current_list_count'));
    }
    public function watch($slug, $tap)
    {

        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();

        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->take('20')->get();
        $phim_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'DESC')->take('10')->get();

        $movie = Movie::with('country', 'category', 'genre', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        if (isset($tap)) {

            $tapphim = $tap;
            $tapphim = substr($tap, 4);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
        }
        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phim_trailer', 'episode', 'tapphim'));
    }
    public function episode()
    {
        $category = Category::orderby('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderby('id', 'DESC')->get();
        $country = Country::orderby('id', 'DESC')->get();
        return view('pages.episode', compact('category', 'genre', 'country'));
    }
}
