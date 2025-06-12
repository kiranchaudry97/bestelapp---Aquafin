<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Aquafin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen text-gray-800 font-sans">

  {{-- Navigatie --}}
  <nav class="bg-white shadow-sm border-b mb-6">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/logoaquafin.jpg') }}" alt="Aquafin" class="h-10 w-auto">
        
      </div>

      <div class="flex items-center space-x-3 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="bg-blue-400 text-white px-4 py-1 rounded-full font-semibold hover:bg-blue-500">Dashboard</a>
        <a href="{{ route('admin.materials.index') }}" class="bg-blue-400 text-white px-4 py-1 rounded-full font-semibold hover:bg-blue-500">+ Materiaal</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full font-semibold hover:bg-red-600">Afmelden</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-4">👋 Welkom, Admin!<br><span class="text-gray-500 text-lg">dashboard</span></h1>

    {{-- Statistieken --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
      <div class="bg-white rounded border shadow p-4 text-center">
        <h2 class="font-semibold text-blue-600 text-sm mb-2">Totaal Materialen</h2>
        <p class="text-3xl font-bold">{{ $totalMaterials }}</p>
      </div>

      <div class="bg-white rounded border shadow p-4">
        <h2 class="font-semibold text-yellow-600 text-sm mb-2">⚠ Materialen met lage voorraden</h2>
        <ul class="text-sm list-disc list-inside text-gray-700">
          @forelse ($lowStockMaterials as $item)
            <li>{{ $item->naam }} ({{ $item->voorraad }} stuk)</li>
          @empty
            <li>Geen lage voorraden</li>
          @endforelse
        </ul>
      </div>
    </div>

    {{-- Recent toegevoegd --}}
    <div class="bg-white border rounded shadow p-4">
      <h2 class="text-sm font-semibold text-blue-600 mb-3">📅 Recent toegevoegd</h2>
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b text-left text-gray-600">
            <th class="pb-1">Naam</th>
            <th class="pb-1">Datum toegevoegd</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($recentMaterials as $item)
            <tr class="border-t hover:bg-gray-50">
              <td class="py-1">{{ $item->naam }}</td>
              <td class="py-1">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="2" class="text-gray-500 py-2">Geen recente materialen.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Footer --}}
    <footer class="mt-6 text-xs text-center text-blue-600">
      Aquafin - groep 5<br>
      contact : <a href="mailto:example@aquafin.be" class="underline">example@aquafin.be</a> (externe link)
    </footer>
  </div>
</body>
</html>