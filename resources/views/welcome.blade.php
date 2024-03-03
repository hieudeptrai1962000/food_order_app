<head>
    <title>Tempting Buttons</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-[100vh] flex items-center justify-center">
<div class="border-2 rounded-md p-[50px]">
    <div>
        <button onclick="clickHereToStart()"
                class="mb-[20px] w-[200px] rounded-md bg-[#EB3F3F] py-[8px] text-[14px] font-semibold text-white shadow-[0px_0px_0px_2px_rgba(213,61,61,1),inset_0px_1px_1px_0px_rgba(255,255,255,0.3)] [text-shadow:_0_1px_0_rgb(0_0_0_/_20%)]">
            Click here to start
        </button>
    </div>
</div>
</body>
<script>
    function clickHereToStart() {
        window.location.href = "{{route('toStep', ['step' => 'step1'])}}";
    }
</script>
