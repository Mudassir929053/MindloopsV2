<!DOCTYPE html>
<html>
<head>
    <title>Create Google Meet</title>
</head>
<body>
    <form id="create-meet-form">
        <label for="class-date">Class Date:</label>
        <input type="date" id="class-date" name="class_date" required>
        
        <label for="class-time">Class Time:</label>
        <input type="time" id="class-time" name="class_time" required>

        <button type="submit">Create Google Meet</button>
    </form>

    <script>
        document.getElementById('create-meet-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const date = document.getElementById('class-date').value;
            const time = document.getElementById('class-time').value;

            fetch('create_meet.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ date: date, time: time }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Google Meet created: ' + data.meet_link);
                } else {
                    alert('Failed to create Google Meet');
                }
            });
        });
    </script>
</body>
</html>
