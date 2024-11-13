<x-welcomelayout class="p-0 m-0">
    <x-slot:title>
        {{ $title }} 
    </x-slot:title>

    <!-- Viewport Meta Tag -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <!-- Hero Section -->
    <section id='hero-section' class="h-screen relative">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50 p-4 md:p-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">Nocturnal Sanctuary</h1>
                <h3  class="text-3xl md:text-5xl font-bold text-gray-400 leading-tight">Where the Night Comes Alive</h3>
                <p class="text-lg md:text-2xl text-white leading-relaxed mt-4">We don't just care for animals, but for the people who call themselves nocturnal.</p>
                <button class="mt-6 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition duration-300"><a href="/articles"> Learn More </a></button>
            </div>
        </div>
    </section>

 <!-- About and Get Involved Section -->
 <section class="bg-transparent py-8 md:py-12 my-8">
    <div class="container mx-auto px-4 md:px-6 lg:px-16 xl:px-20">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- About Section -->
            <div class="md:w-1/2 mx-3 mb-8 md:mb-0">
                <h2 class="text-2xl md:text-3xl font-bold text-white leading-tight text-center">Our Mission</h2>
                <p class="text-base md:text-lg text-gray-300 leading-relaxed mt-4">At Nocturnal Sanctuary, we believe that the night is not just a time for rest, but a time for exploration and discovery. Our mission is to provide a safe and welcoming space for both animals and humans who thrive in the darkness.</p>
            </div>

            <!-- Get Involved Section -->
            <div class="md:w-1/2 mx-3">
                <h2 class="text-2xl md:text-3xl font-bold text-white leading-tight text-center">Get Involved</h2>
                <p class="text-base md:text-lg text-gray-300 leading-relaxed mt-4">Join us in our mission to create a sanctuary for all things nocturnal. Whether you're an animal lover, a night owl, or just someone who appreciates the beauty of the dark, we invite you to get involved and be a part of our community.</p>
                <button class="mt-6 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition duration-300"><a href="/login">Join Our Community </a></button>
            </div>
        </div>
    </div>
</section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define an array of image URLs from the Laravel storage (1 to 30)
            const images = [
                '{{ asset('storage/home-image/Animal/1.jpg') }}',
                '{{ asset('storage/home-image/Animal/2.jpg') }}',
                '{{ asset('storage/home-image/Animal/3.jpg') }}',
                '{{ asset('storage/home-image/Animal/4.jpg') }}',
                '{{ asset('storage/home-image/Animal/5.jpg') }}',
                '{{ asset('storage/home-image/Animal/6.jpg') }}',
                '{{ asset('storage/home-image/Animal/7.jpg') }}',
                '{{ asset('storage/home-image/Animal/8.jpg') }}',
                '{{ asset('storage/home-image/Animal/9.jpg') }}',
                '{{ asset('storage/home-image/Animal/10.jpg') }}',
                '{{ asset('storage/home-image/Animal/11.jpg') }}',
                '{{ asset('storage/home-image/Animal/12.jpg') }}',
                '{{ asset('storage/home-image/Animal/13.jpg') }}',
                '{{ asset('storage/home-image/Animal/14.jpg') }}',
                '{{ asset('storage/home-image/Animal/15.jpg') }}',
                '{{ asset('storage/home-image/Animal/16.jpg') }}',
                '{{ asset('storage/home-image/Animal/17.jpg') }}',
                '{{ asset('storage/home-image/Animal/18.jpg') }}',
                '{{ asset('storage/home-image/Animal/19.jpg') }}',
                '{{ asset('storage/home-image/Animal/20.jpg') }}',
                '{{ asset('storage/home-image/Animal/21.jpg') }}',
                '{{ asset('storage/home-image/Animal/22.jpg') }}',
                '{{ asset('storage/home-image/Animal/23.jpg') }}',
                '{{ asset('storage/home-image/Animal/24.jpg') }}',
                '{{ asset('storage/home-image/Animal/25.jpg') }}',
                '{{ asset('storage/home-image/Animal/26.jpg') }}',
                '{{ asset('storage/home-image/Animal/27.jpg') }}',
                '{{ asset('storage/home-image/Animal/28.jpg') }}',
                '{{ asset('storage/home-image/Animal/29.jpg') }}',
                '{{ asset('storage/home-image/Animal/30.jpg') }}'
            ];

            // Select a random image from the array
            const randomImage = images[Math.floor(Math.random() * images.length)];

            // Set the random image as the background-image of the hero section
            const heroSection = document.getElementById('hero-section');
            heroSection.style.backgroundImage = `url(${randomImage})`;
            heroSection.style.backgroundSize = 'cover';  // Cover the entire section
            heroSection.style.backgroundPosition = 'center';  // Center the background image
        });
    </script></x-welcomelayout>
