<nav class="bg-white shadow mb-6">
  <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
    <div class="text-lg font-bold">BestelApp</div>
    <div class="space-x-4 text-sm">
      <a href="{{ route('technieker.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
      <a href="{{ route('technieker.materials.index') }}" class="text-blue-600 hover:underline">Materialen</a>
      <a href="{{ route('technieker.cart.view') }}" class="text-blue-600 hover:underline">Winkelmand</a>
      <a href="{{ route('technieker.orders.index') }}" class="text-blue-600 hover:underline">Mijn bestellingen</a>
      <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-red-600 hover:underline">Uitloggen</button>
      </form>
    </div>
  </div>
</nav>