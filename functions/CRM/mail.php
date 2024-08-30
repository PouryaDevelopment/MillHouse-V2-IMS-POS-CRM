<?php
require_once('functions/index/connection2data.php');

// fetchs all promo list entries
$stmt = $connection->prepare("SELECT pl_id, full_name, email FROM promolist");
$stmt->execute();
$promoListEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl">Mail</h2><br>
    <div class="flex justify-center">
        <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/mail.png">
    </div>
    <div class="flex justify-center content-center h-[660px]">
        <div class="w-3/4 self-center ">
            
   
        <form class="" action="./functions/CRM/send_promo_emails.php" method="post">
            <div class="grid grid-cols-2">
                <div>
        <label class="w-full text-center" for="subject">Email Subject:</label><br>
        <input class="w-full bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" id="subject" name="subject" required><br>
        
        <label class="w-full text-center" for="message">Email Message:</label><br>
        <textarea class="w-full h-[200px] bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" id="message" name="message" required></textarea>
        
        <div>
            </div>
            </div>
            <div>
            <label for="recipients">Select Recipients:</label><br>
        <select  class="w-3/4 h-[250px] bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" id="recipients" name="recipients[]" multiple size="10">
            <!-- options will be fetched  from promolist -->
            <option  class="w-full text-center" value="all">Send to All</option>
            <?php foreach ($promoListEntries as $entry): ?>
            <option  class="w-full text-center" value="<?php echo htmlspecialchars($entry['email']); ?>">
                <?php echo htmlspecialchars($entry['full_name']); ?>
            </option>
            <?php endforeach; ?>
        </select><br>
   </div>
        </div><br>
        
       <div class="flex justify-center  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
            <input class="text-2xl " type="submit" value="Send Emails">
            <div class="flex justify-center self-center">
        <img class="h-7 w-7 mx-2 mt-1  flex justify-center "  src="./UI/sendmail.png">
        </div>
       </div>
    </form>
        </div>
    </div>
</body>
</html>