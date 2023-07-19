<x-app-layout title="Cek Kegiatan" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="pages.cekjadwal.jadwaldata">
        <div
            class="mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
            <div>
                <h3 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                    Jadwal Kegiatan Vihara Damai Sejahtera
                </h3>
                <p class="mt-1 hidden sm:block">Kumpulan jadwal dapat dilihat</p>
            </div>
        </div>
        <div id="datavihara">
        </div>




    </main>
</x-app-layout>
