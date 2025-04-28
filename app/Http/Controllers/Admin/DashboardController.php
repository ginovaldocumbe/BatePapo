<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\IdeaLike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function index()
    {

        // Dados Totais
        $totalUsers = User::count();
        $totalPosts = Idea::count();
        $totalComments = Comment::count();
        $totalLikes = IdeaLike::count();

        // Novos utilizadores por mês (últimos 6 meses)
        $usersPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        //    // Utilizadores mais seguidos (top 5)
        //    $mostFollowedUsers = User::withCount('followers')
        //        ->orderByDesc('followers_count')
        //        ->take(5)
        //        ->get();

        //    // Utilizadores mais activos (posts + comentários + likes) (top 5)
        //    $mostActiveUsers = User::withCount(['posts', 'comments', 'likes'])
        //        ->get()
        //        ->sortByDesc(function($user) {
        //            return $user->posts_count + $user->comments_count + $user->likes_count;
        //        })
        //        ->take(5);

        //    // Posts criados por mês (últimos 6 meses)
        //    $postsPerMonth = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        //        ->where('created_at', '>=', now()->subMonths(6))
        //        ->groupBy('month')
        //        ->orderBy('month')
        //        ->get();

        //    // Posts mais populares (likes)
        //    $mostLikedPosts = Post::withCount('likes')
        //        ->orderByDesc('likes_count')
        //        ->take(5)
        //        ->get();

        //    // Posts mais comentados
        //    $mostCommentedPosts = Post::withCount('comments')
        //        ->orderByDesc('comments_count')
        //        ->take(5)
        //        ->get();

        //    // Posts mais recentes
        //    $recentPosts = Post::latest()->take(5)->get();

        //    // Média de likes e comentários por post
        //    $avgLikesPerPost = Like::count() / max(Post::count(), 1);
        //    $avgCommentsPerPost = Comment::count() / max(Post::count(), 1);

        //    // Seguidores
        //    $avgFollowersPerUser = Follow::count() / max(User::count(), 1);

        //    // Top utilizadores que mais ganham seguidores (opcional - podes usar created_at para filtrar por novo follow)
        //    $topGainedFollowers = User::withCount('followers')
        //        ->orderByDesc('followers_count')
        //        ->take(5)
        //        ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPosts',
            'totalComments',
            'totalLikes',

            'usersPerMonth',
        ));
    }
}
