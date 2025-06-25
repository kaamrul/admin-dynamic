@if (session('success'))
    <script type="module"> notify("{{ session('success') }}", 'success');</script>
@elseif (session('error'))
    <script type="module"> notify("{{ session('error') }}", 'error');</script>
@elseif (session('catchSuccess'))
    <script type="module"> catchNotify("{{ session('catchSuccess') }}", 'success');</script>
@elseif (session('catchError'))
    <script type="module"> catchNotify("{{ session('catchError') }}", 'error');</script>
@endif
