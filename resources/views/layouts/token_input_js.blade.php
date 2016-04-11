@if (isset($lessonId))
    <script type="text/javascript">
        $(document).ready(function() {
            $("#word_id").tokenInput("/word/search/{!! $lessonId !!}", {
                tokenLimit: 10,
            });
        });
    </script>
@endif