<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
            required
            autofocus
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">

            <div class="flex items-center">
                <img
                src="{{ current_user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
                >

                <label for="image" class="cursor-pointer ml-4 mt-8">
                    <i class="fas fa-image text-blue-600 text-2xl"></i>
                </label>

                <input class="hidden"
                       type="file"
                       name="image"
                       id="image"
                       accept="image/*"
                >
            </div>

            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
