
                        $(document).ready(function($) {
                            var i = 2;
                            $('input.btn.btn-primary.add_more_btn').click(function(){
                                var text = '<div class="form-group">'
                                            +'<input name="vablum_videos_'+ i +'" type="text" class="form-control" style="width:95%;">'
                                            +'<input type="button" class="close_more_videos" value="X">'
                                            +'</div>';
                                $('.add-more-videos').append(text);
                                i++;                                        
                            });
                            $('.close_more_videos').click(function(){ $(this).hide(); $(this).prev().hide(); $(this).prev().val(''); });
                        });