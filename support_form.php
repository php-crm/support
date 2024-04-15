<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Support Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .response-message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit a Support Ticket</h2>
        <form id="supportForm" method="POST">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            
            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" required><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br>
            
            <input type="submit" value="Submit Ticket">
        </form>
        <div id="responseMessage" class="response-message"></div>
    </div>

    <script>
        document.getElementById("supportForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            var formData = new FormData(this); // Get form data

            // Send form data via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "submit_support_ticket.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    var response = xhr.responseText; // Get response
                    var responseMessage = document.getElementById("responseMessage");
                    responseMessage.innerHTML = response; // Display response message
                    responseMessage.classList.remove("success-message", "error-message");
                    if (response.includes("successfully")) {
                        responseMessage.classList.add("success-message");
                    } else {
                        responseMessage.classList.add("error-message");
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
