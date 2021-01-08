<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Announcements;
use App\Carousel;
use App\Category;
use App\DonationPackage;
use Illuminate\Http\Request;
use App\Posts;
use App\Product;
use App\Tags;
use App\Transaction;

class HomepageController extends Controller
{
    public function index(Posts $posts ){
        $announcement = Announcements::all();
        $carousel = Carousel::orderBy('id', 'DESC')->get();
        $category_widget = Category::all();
        $tag =Tags::all();
        $data = $posts->latest()->take(6)->get();
        $items = Product::take(4)->get();

        // $client = new \GuzzleHttp\Client();
        // $request = $client->get('https://api.banghasan.com/sholat/format/json/jadwal/kota/703/tanggal/2017-02-07');
        // $response = $request->getBody();

        // return $response;

        return view('user.homepage.home', compact('data', 'category_widget', 'tag', 'items', 'carousel','announcement'));
    }

    public function detail_post($slug){
        $category_widget = Category::all();
        $tag =Tags::all();
        $data = Posts::where('slug', $slug)->get();

        return view('user.acarainfo.detail', compact('data', 'category_widget', 'tag'));
    }

    public function list_post(){
        $category_widget = Category::all();
        $tag =Tags::all();
        $data = Posts::latest()->paginate(5);

        return view('user.acarainfo.index', compact('data', 'category_widget', 'tag'));
    }

    public function list_category(category $category){
        $category_widget = Category::all();
        $tag =Tags::all();
        $data = $category->posts()->paginate();

        return view('user.acarainfo.index', compact('data', 'category_widget','tag'));
    }

    public function list_tags(tags $tags){
        $category_widget = Category::all();
        $tag =Tags::all();
        $data = $tags->posts()->paginate();

        return view('user.acarainfo.index', compact('data', 'category_widget','tag'));
    }

    public function search(Request $request){
        $category_widget = Category::all();
        $tag =Tags::all();

        $data = Posts::where('title', $request->search)->orWhere('title', 'like', '%'.$request->search.'%')->paginate(6);
        return view('user.acarainfo.index', compact('data', 'category_widget','tag'));
    }

    public function list_donation(){

        $items = DonationPackage::where('target_waktu', '>=', now())->with(['galleries'])->paginate(8);

        $donation_package = DonationPackage::count();
        $transaction = Transaction::count();
        $transaction_pending = Transaction::where('transaction_status', 'PENDING')->count();
        $transaction_success = Transaction::where('transaction_status', 'SUCCESS')->count();

        
        return view('user.pelayananjenazah.donationlist', compact('items','donation_package','transaction','transaction_pending','transaction_success'));
    }

}
