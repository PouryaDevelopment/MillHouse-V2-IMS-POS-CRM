<?php
include('functions/index/connection2data.php');

// fetchs all website feedback entries from the database
$stmt = $connection->prepare("SELECT feedback_website_id, fullname, comment, rating, created_at FROM feedback");
$stmt->execute();
$feedbackEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl py-3">Website Feedback</h2>
    <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">ID</th>
                <th class="text-center p-1">Full Name</th>
                <th class="text-center p-1">Comment</th>
                <th class="text-center p-1">Rating</th>
                <th class="text-center p-1">Created At</th>
                <th class="text-center p-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedbackEntries as $feedback): ?>
            <tr class="border border-black">
                <td class="text-center w-4 bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($feedback['feedback_website_id']); ?></td>
                <td class="text-center border border-black p-1"><?php echo htmlspecialchars($feedback['fullname']); ?></td>
                <td class="text-center border border-black p-1"><?php echo htmlspecialchars($feedback['comment']); ?></td>
                <td class="text-center border border-black w-4 p-1"><?php echo htmlspecialchars($feedback['rating']); ?></td>
                <td class="text-center border border-black p-1 w-[150px]"><?php echo htmlspecialchars($feedback['created_at']); ?></td>
                <td class="text-center border border-black p-1 w-[100px]">
                    <a class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" href="./functions/CRM/delete_feedback.php?feedback_website_id=<?php echo $feedback['feedback_website_id']; ?>" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete<img class="h-5 w-5 mx-2"  src="./UI/delete.png"></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>