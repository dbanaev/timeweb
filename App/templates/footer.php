    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            $('a.show-results').on('click', function(e) {
                e.preventDefault();

                $(this).closest('tr').next().toggle();
            });

            $('#type').on('change', function() {
                if ($(this).val() == 'text') {
                    $('#text-group').show();
                } else {
                    $('#text-group').hide();
                }
            });

            $('#search-form').on('submit', function (e) {
                e.preventDefault();

                $(this).find('div').removeClass('has-error');
                $('#error').hide();
                $('#success').hide();

                var url = $('#url').val();
                var type = $('#type').val();
                var text = $('#text').val();

                var errors = 0;

                if (!url) {
                    $('#url').closest('div').addClass('has-error');
                    errors++;
                }

                if (type == 'text' && text == '') {
                    $('#text').closest('div').addClass('has-error');
                    errors++;
                }

                if (errors == 0) {

                    $.ajax({
                            url: '/index/parse',
                            type: 'post',
                            dataType: 'json',
                            data: {url: url, type: type, text: text},
                            success: function (data) {
                                if (data.success) {
                                    $('#success').show();
                                    $('#success').text('Результаты поиска сохранены');
                                } else if (data.error) {
                                    $('#error').show();
                                    $('#error').text(data.error);
                                }
                            }
                        }
                    );
                }
            })
        });
    </script>
    </div>
</body>
</html>