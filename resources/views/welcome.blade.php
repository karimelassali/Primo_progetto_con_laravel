<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nav-bar />
<form id="mainForm"  class="w-full h-full border grid items-center">
    @csrf

    <div class="w-full border border-red-300  h-screen  flex-col gap-2 p-2 flex justify-center items-center" >
        <input  required name="title" placeholder="Title" type="text" class="w-1/2 h-10 p-2 border-2 border-gray-300 rounded-lg">
        <input  required name="preority" placeholder="Mission Priority" type="text" class="w-1/2 h-10 p-2 border-2 border-gray-300 rounded-lg" >
        <button class="w-1/2 h-10 p-2 border-2 border-gray-300 rounded-lg bg-blue-500 text-white" type="submit">Create</button>
    </div>

</form>

<script>
    console.log('hy')

    const form = document.getElementById('mainForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        formData.append('publisher', "{{ Auth::user()->name }}");
        fetch('/api/create', {
            method: 'POST',
            body: formData,
        }).then((res) => {
            if (res.status === 201) {
                window.location.href = '/show';
            }
            console.log(res);
        });
    });
</script>
</body>
</html>