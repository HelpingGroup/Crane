<div class="flex items-center justify-between h-16 px-8 shadow-lg w-100">
    <a href="{{ route('collaborate') }}" class="flex">
        <img src="/crane.png" alt="Crane" class="w-auto h-8 mr-2">
        <h1 class="text-2xl font-bold">Crane</h1>
    </a>

    <div class="flex space-x-4">
        <a class="text-gray-900" href="/collaborate">Collaborate</a>
        <a class="text-gray-400 cursor-not-allowed" href="#">Metrics</a>
        <a class="text-gray-400 cursor-not-allowed" href="#">Profile</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="text-gray-900" type="submit">Logout</button>
        </form>
    </div>
</div>