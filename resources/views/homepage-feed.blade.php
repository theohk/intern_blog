<x-layout>
    <div class="container py-md-3">
        <div class="text-center">
            <h2>Hello <strong>{{ auth()->user()->username }}</strong>, you have {{ $postCount }} posts.</h2>
            <p class="lead text-muted">Create a post or read other's content!</p>
        </div>
    </div>
</x-layout>
