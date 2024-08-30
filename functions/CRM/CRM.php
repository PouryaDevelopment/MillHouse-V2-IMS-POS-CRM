				<!-- table insert for the memmbers -->
<?php
include('functions/index/connection2data.php');

// Fetch all promo list entries from the database for members table
$stmt = $connection->prepare("SELECT pl_id, full_name, email, created_at FROM promolist");
$stmt->execute();
$promoListEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
				<!-- query with "UNION" to get data from both tables for ratings 3 and below -->
<?php
$query = "
    (SELECT feedback_instore_id AS id, product_id, instore_comment AS comment, instore_rating AS rating FROM instore_feedback WHERE instore_rating < 3)
    UNION ALL
    (SELECT feedback_website_id AS id, NULL as product_id, comment, rating FROM feedback WHERE rating < 3)
    ORDER BY id DESC
";

$stmt = $connection->prepare($query);
$stmt->execute();
$feedbackEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

					<!-- query for 3 and above -->

<?php
// query with "UNION" to get data from both tables for ratings 3 and above
$query = "
    (SELECT feedback_instore_id AS id, product_id, instore_comment AS comment, instore_rating AS rating FROM instore_feedback WHERE instore_rating >= 3)
    UNION ALL
    (SELECT feedback_website_id AS id, NULL as product_id, comment, rating FROM feedback WHERE rating >= 3)
    ORDER BY id DESC
";

$stmt = $connection->prepare($query);
$stmt->execute();
$positiveFeedbackEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

					<!-- Totals -->

<?php

// query to qet the total count of bad feedback
$badFeedbackCountQuery = "
    (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating < 3)
    UNION ALL
    (SELECT COUNT(*) FROM feedback WHERE rating < 3)
";
$stmt = $connection->prepare($badFeedbackCountQuery);
$stmt->execute();
$badFeedbackCounts = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
$totalBadFeedback = array_sum($badFeedbackCounts);

// query to get the total count of good feedback
$goodFeedbackCountQuery = "
    (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating >= 3)
    UNION ALL
    (SELECT COUNT(*) FROM feedback WHERE rating >= 3)
";
$stmt = $connection->prepare($goodFeedbackCountQuery);
$stmt->execute();
$goodFeedbackCounts = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
$totalGoodFeedback = array_sum($goodFeedbackCounts);
?>

<!DOCTYPE html>
<html lang="en">
<body>
<h2 class="text-3xl py-3">CRM</h2>
<div class="grid grid-cols-3 gap-4 ">
		<!-- negative table column1 -->
<div id="negfeedcol1" class="overflow-x-auto h-[500px]">
	<div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg" style="  font-family: 'Bebas Neue';">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-amber-700/50 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/neg.png">

          </li>
          <h3 class="underline text-3xl p-1">Negative</h3>  
<table class="w-full">
    <thead>
        <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold">
            <th class="text-center p-1">ID</th>
            <th class="text-center p-1">Product ID</th>
            <th class="text-center p-1">Comment</th>
            <th class="text-center p-1">Rating</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($feedbackEntries as $entry2): ?>
            <tr class="border border-black">
                <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($entry2['id']); ?></td>
                <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry2['product_id']); ?></td>
                <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry2['comment']); ?></td>
                <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry2['rating']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

</div>
	<!-- Totals -->

<div class="grid grid-rows-2 h-[500px]">
	<img class=" fill-current justify-self-center h-[300px] w-[300px]" focusable="false"  src="./UI/crmdash.png">
	<div class="grid grid-rows-3">
		<br>
		<br>
		<div class="grid grid-rows-4">
			<br>
			<span class="text-2xl ">Total:</span>
			
		</div>
		<span class="flex justify-center text-2xl mt-2" id="bad-feedback-count"><img class="h-9 w-9 mx-2 mr-2 p-1"  src="./UI/notif.png">Bad Feedback: <?php echo $totalBadFeedback; ?></span>
		<span class="flex justify-center text-2xl m-3" id="good-feedback-count"><img class="h-[27px] w-7 ml-2 mx-2 "  src="./UI/like.png">Good Feedback: <?php echo $totalGoodFeedback; ?></span>

	</div>
	

</div>


<!-- posative table column3 -->
<div id="posfeedcol3" class="overflow-x-auto h-[500px]">
<!-- Your table structure here -->
<div class="border-2   bg-gradient-to-r from-amber-300/25 to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg" style="  font-family: 'Bebas Neue';">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-blue-300/50 to-amber-300/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/posi.png">

          </li>
          <h3 class="underline text-3xl p-1">Posative</h3>  

<table class="w-full">
    <thead>
        <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold">
            <th class="text-center p-1">ID</th>
            <th class="text-center p-1">Product ID</th>
            <th class="text-center p-1">Comment</th>
            <th class="text-center p-1">Rating</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positiveFeedbackEntries as $entry3): ?>
        <tr class="border border-black">
            <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($entry3['id']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry3['product_id']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry3['comment']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry3['rating']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
<div class="col-span-3 justify-self-center w-full flex justify-center">
	<div class="w-[1400px] border-2 row-span-2 col-span-2 border-2 justify-self-stretch  bg-gradient-to-r from-amber-300/25 to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg" style="  font-family: 'Bebas Neue';">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-amber-400/50 to-amber-300/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/members.png">

          </li>
          <h3 class="underline text-3xl p-1">Members</h3>  
	<table class="w-full">
    <thead>
        <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold">
            <th class="text-center p-1">ID</th>
            <th class="text-center p-1">Full Name</th>
            <th class="text-center p-1">Email</th>
            <th class="text-center p-1">Created At</th>
            <th class="text-center p-1">Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($promoListEntries as $entry): ?>
        <tr class="border border-black">
            <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($entry['pl_id']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry['full_name']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry['email']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($entry['created_at']); ?></td>
            <td class="text-center   p-1 font-bold flex justify-center">
            		<form action="./functions/CRM/delete_mem.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                <input type="hidden" name="pl_id" value="<?php echo $entry['pl_id']; ?>">
                <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit" name="delete">Delete<img class="h-5 w-5 mx-2"  src="./UI/delete.png"></button>
            </form>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

</body>
</html>