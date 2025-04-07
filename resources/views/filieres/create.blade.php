@extends('layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-[#0f172a] via-[#112825] to-[#0f172a] flex flex-col justify-between">

        <!-- Header -->
        <div class="pt-16 px-6 flex flex-col items-center">

            <!-- Logo -->
            <div class="mb-4 animate-fade-in-down">
                <img src="{{ asset('images/logi.jpg') }}" alt="Ngue Ngan Result Logo" class="w-24 h-24 rounded-full shadow-lg border-2 border-teal-500 p-1">
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-teal-400 mb-4 animate-fade-in-down">Bienvenue sur Ngue Ngan Result</h1>
            <p class="text-lg text-gray-300 mb-8 animate-fade-in-up">Ajoutez une nouvelle filière à votre plateforme</p>

            <!-- Form -->
            <div class="bg-[#112825]/90 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-gray-700 w-full max-w-lg animate-fade-in-up">
                <h2 class="text-2xl font-semibold text-white mb-6 text-center">Ajout d'une Filière</h2>
                <form action="{{ route('filieres.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Champ Nom -->
                    <div>
                        <input type="text" name="name" placeholder="Nom de la filière"
                            class="w-full px-4 py-3 bg-gray-900/60 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all"
                            required>
                        @error('name')
                            <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="flex space-x-4">
                        <button type="submit"
                            class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 rounded-full shadow-lg transition transform hover:scale-105">
                            Ajouter
                        </button>
                        <a href="{{ route('filieres.index') }}"
                            class="w-full bg-gray-700 hover:bg-gray-600 text-white font-semibold py-3 rounded-full text-center shadow-lg transition transform hover:scale-105">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Réseaux Sociaux -->
        <div class="flex justify-center space-x-6 mt-12 animate-fade-in-up">
            <a href="#" class="text-gray-400 hover:text-teal-400 text-2xl"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-gray-400 hover:text-teal-400 text-2xl"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-teal-400 text-2xl"><i class="fab fa-instagram"></i></a>
        </div>

        <!-- Footer -->
        <footer class="text-center py-6 text-gray-500 text-sm border-t border-gray-700 animate-fade-in-up">
            © 2025 Ngue Ngan Result — Tous droits réservés.
        </footer>
    </div>

    <!-- GSAP Animations -->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script>
            gsap.from(".animate-fade-in-down", {
                y: -50,
                opacity: 0,
                duration: 1,
                ease: "power3.out"
            });

            gsap.from(".animate-fade-in-up", {
                y: 50,
                opacity: 0,
                duration: 1,
                ease: "power3.out",
                stagger: 0.3
            });
        </script>
    @endpush
@endsection
