jQuery(document).ready(function($) {
    var audio = new Audio();
    var playlist = [];
    var currentTrack = 0;

    // Play/Pause button
    $('#play-pause-btn').on('click', function() {
        if (audio.paused) {
            audio.play();
            $(this).html('<i class="fas fa-pause"></i>');
        } else {
            audio.pause();
            $(this).html('<i class="fas fa-play"></i>');
        }
    });

    // Next button
    $('#next-btn').on('click', function() {
        currentTrack = (currentTrack + 1) % playlist.length;
        playTrack(currentTrack);
    });

    // Previous button
    $('#prev-btn').on('click', function() {
        currentTrack = (currentTrack - 1 + playlist.length) % playlist.length;
        playTrack(currentTrack);
    });

    // Volume control
    $('#volume-slider').on('input', function() {
        audio.volume = $(this).val();
    });

    // Update progress bar
    $(audio).on('timeupdate', function() {
        var currentTime = audio.currentTime;
        var duration = audio.duration;
        $('.progress-bar').css('width', (currentTime / duration) * 100 + '%');
        $('#current-time').text(formatTime(currentTime));
        $('#duration').text(formatTime(duration));
    });

    // Click on progress bar to seek
    $('.progress-bar-container').on('click', function(e) {
        var percent = e.offsetX / $(this).width();
        audio.currentTime = percent * audio.duration;
    });

    // When a track is clicked in the tracklist
    $(document).on('click', '.play_single_music', function(e) {
        e.preventDefault();
        var musicId = $(this).data('musicid');

        // Make an AJAX call to get the track URL
        $.ajax({
            url: 'https://sumprec.com/wp-admin/admin-ajax.php', // This should ideally be localized
            type: 'POST',
            data: {
                action: 'get_track_url_from_id',
                music_id: musicId
            },
            success: function(response) {
                if (response.success && response.data.track_url) {
                    var trackUrl = response.data.track_url;
                    var trackIndex = playlist.indexOf(trackUrl);

                    if (trackIndex !== -1) {
                        currentTrack = trackIndex;
                    } else {
                        playlist.push(trackUrl);
                        currentTrack = playlist.length - 1;
                    }
                    playTrack(currentTrack);
                } else {
                    console.error('Error: Could not retrieve the track URL.');
                    // You could add some user feedback here, like an alert.
                }
            },
            error: function() {
                console.error('AJAX request failed.');
            }
        });
    });

    function playTrack(trackIndex) {
        audio.src = playlist[trackIndex];
        audio.play();
        $('#play-pause-btn').html('<i class="fas fa-pause"></i>');
    }

    function formatTime(time) {
        var min = Math.floor(time / 60);
        var sec = Math.floor(time % 60);
        return min + ':' + (sec < 10 ? '0' : '') + sec;
    }
});