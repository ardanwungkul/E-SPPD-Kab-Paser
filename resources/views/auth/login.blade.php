<x-guest-layout>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class=" bg-white rounded-lg shadow-lg border-t-4 border-color-1-400 max-w-lg w-full overflow-hidden">
            <div class="h-3 w-full border-b hidden md:block">
            </div>
            <div class="grid md:grid-cols-12 gap-4 md:divide-x p-4">
                <div class="md:col-span-5 hidden h-full md:flex items-center justify-center p-3">
                    <img src="{{ asset('assets/images/logo-kab-paser.png') }}" class="w-full" alt="">
                </div>

                <div class="w-full md:pl-4 md:col-span-7">

                    <x-auth-session-status class="mb-4" :status="session('status')" />


                    <div class="h-full flex items-start pt-4">
                        <div class="space-y-2">
                            <p class="text-2xl font-bold">
                                Sekretariat Daerah
                            </p>
                            <div>
                                <label for="username_or_email" class="text-sm">Username</label>
                                <div class="flex shadow-md border border-gray-300 rounded-lg">
                                    <div
                                        class="bg-secondary-3 h-auto rounded-l-lg flex items-center justify-center w-10 flex-none">
                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="1.5"
                                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="username_or_email" name="username_or_email"
                                        autocomplete="username" required autofocus
                                        value="{{ old('username_or_email') }}"
                                        class="block w-full rounded-r-lg text-sm border-none">
                                </div>
                            </div>

                            <div>
                                <label for="password" class="text-sm">Kata Sandi</label>
                                <div class="flex shadow-md border border-gray-300 rounded-lg">
                                    <div
                                        class="bg-secondary-3 h-auto rounded-l-lg flex items-center justify-center w-10 flex-none">
                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                                        </svg>

                                    </div>
                                    <input type="password" id="password" name="password" autocomplete="password"
                                        required autofocus value="{{ old('password') }}"
                                        class="block w-full rounded-r-lg text-sm border-none">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="flex justify-between bg-secondary-3 p-4">
                <div>
                    <select name="tahun" id="tahun" class="rounded-lg text-xs" required>
                        <option value="" selected disabled>Pilih Tahun</option>
                        @foreach ($config as $item)
                            <option value="{{ $item->tahun }}" {{ $item->tahun == now()->year ? 'selected' : '' }}>
                                {{ $item->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="bg-color-1-400 hover:bg-opacity-80 text-white rounded-lg text-xs px-5 font-medium py-1 border">Submit</button>
            </div>
        </div>
    </form>
</x-guest-layout>
