<?php

// Menghapus semua session
session_destroy();

// Mengalihkan halaman ke halaman signup
?>
<script>
    window.location.href = "?page=login&alert=logout";
</script>
<?php
?>