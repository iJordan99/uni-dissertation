<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>

    <main class="grid grid-cols-5">
      <x-_nav/>
      <section class="h-screen col-span-4 p-10 bg-blue-100 overflow-scroll sm:overflow-y-auto sm:max-h-screen">
        {{ $slot }}
      </section>
    </main>


    
    

  

</body>
</html>