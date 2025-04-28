<div class="row g-4">

    <!-- Users -->
    <div class="col-12 col-md-3">
        <div class=" rounded-md p-3  bg-blue-300/50">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div>
                    <span class="font-light text-sm">Users</span>
                    <p class="card-text display-6 text-primary">{{ $totalUsers }}</p>
                </div>
                <i class="fas fa-users fa-2x text-blue-500"></i>
            </div>
        </div>
    </div>

    <!-- Posts -->
    <div class="col-12 col-md-3">
        <div class=" rounded-md p-3  bg-green-300/50">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div>
                    <span class="font-light text-sm">Posts</span>
                    <p class="card-text display-6 text-green-500">{{ $totalPosts }}</p>
                </div>
                <i class="fas fa-pen fa-2x text-success"></i>
            </div>
        </div>
    </div>

    <!-- Comments -->
    <div class="col-12 col-md-3">
        <div class=" rounded-md p-3  bg-orange-300/50">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div>
                    <span class="font-light text-sm">Comments</span>
                    <p class="card-text display-6 text-orange-500">{{ $totalComments }}</p>
                </div>
                <i class="fas fa-comments fa-2x text-orange-500"></i>
            </div>
        </div>
    </div>

    <!-- Likes -->
    <div class="col-12 col-md-3">
        <div class=" rounded-md p-3  bg-red-300/50">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div>
                    <span class="font-light text-sm">Likes</span>
                    {{-- <p class="card-text display-6 text-danger">{{ $totalLikes }}</p> --}}
                    <p class="card-text display-6 text-red-500">{{ $totalLikes }}</p>
                </div>
                <i class="fas fa-heart fa-2x text-danger"></i>
            </div>
        </div>
    </div>
</div>