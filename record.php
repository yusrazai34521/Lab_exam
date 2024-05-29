<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body class="min-h-screen bg-green-500 text-gray rounded-lg flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 mt-8">
        <div class="p-6 sm:p-12">
            <div>
                <h1 class="text-2xl xl:text-3xl font-extrabold">Book Records</h1>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "yyyy";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, title, author, genre, publication_date FROM book_registration2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="w-full min-w-full bg-white"><thead class="bg-gray-800 text-white"><tr>';
                    echo '<th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Title</th>';
                    echo '<th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Author</th>';
                    echo '<th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Genre</th>';
                    echo '<th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Publication Date</th>';
                    echo '<th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Actions</th>';
                    echo '</tr></thead><tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="w-1/4 py-3 px-4">' . htmlspecialchars($row["title"]) . '</td>';
                        echo '<td class="w-1/4 py-3 px-4">' . htmlspecialchars($row["author"]) . '</td>';
                        echo '<td class="w-1/4 py-3 px-4">' . htmlspecialchars($row["genre"]) . '</td>';
                        echo '<td class="w-1/4 py-3 px-4">' . htmlspecialchars($row["publication_date"]) . '</td>';
                        echo '<td class="w-1/4 py-3 px-4">';
                        echo '<a href="edit.php?id=' . htmlspecialchars($row["id"]) . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>';
                        echo '<a href="delete.php?id=' . htmlspecialchars($row["id"]) . '" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody></table>';
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
