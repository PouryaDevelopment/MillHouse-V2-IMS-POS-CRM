 function fetchNotifications() {
    fetch('functions/dashboardContainer/fetch_notifications.php')
    .then(response => response.json())
    .then(data => {
        const notificationsArea = document.querySelector('.notif');
        notificationsArea.innerHTML = ''; // Clear previous notifications

        // Add low stock notifications
        data.lowStock.forEach(msg => {
            const notificationItem = document.createElement('li');
            notificationItem.textContent = msg;
            notificationsArea.appendChild(notificationItem);
        });

        // Add negative instore feedback notifications
        data.negativeFeedbackInstore.forEach(feedback => {
    const notificationItem = document.createElement('li');
    notificationItem.innerHTML = `
        ${feedback.comment} 
        <button style="  font-family: 'Bebas Neue'; " class="mr-2  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 text-stone-500 px-2  rounded-2xl bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-lg hover:underline border-2 border-stone-500 uppercase " onclick="acknowledgeNotification(${feedback.feedbackId}, '${feedback.feedbackType}')">Remove</button>
    `;
    notificationsArea.appendChild(notificationItem);
});

        // Add negative website feedback notifications
        data.negativeFeedback.forEach(feedback => {
            const notificationItem = document.createElement('li');
            notificationItem.textContent = feedback.comment;
    notificationItem.innerHTML = `
        ${feedback.comment} 
        <button style="  font-family: 'Bebas Neue'; " class="mr-2  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 text-stone-500 px-2 rounded-2xl bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-lg hover:underline border-2 border-stone-500 uppercase " onclick="acknowledgeNotification(${feedback.feedbackId}, '${feedback.feedbackType}')">Remove</button>
    `;
    notificationsArea.appendChild(notificationItem);
        });

        // Check if there are any notifications
        if (data.lowStock.length === 0 && data.negativeFeedbackInstore.length === 0 && data.negativeFeedback.length === 0) {
            notificationsArea.innerHTML = '<li>No new notifications</li>';
        }
    })
    .catch(error => {
        console.error('error fetching your notifications:', error);
    });
}

// Initial fetch
fetchNotifications();

// Fetch notifications every 2 1/2 minutes
setInterval(fetchNotifications, 150000); // 150000 ms is 2 1/2 minutes

function acknowledgeNotification(feedbackId, feedbackType) {
    fetch('functions/dashboardContainer/acknowledge_notification.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            feedbackId: feedbackId,
            feedbackType: feedbackType
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the notification from the list or re-fetch notifications
            fetchNotifications();
        } else {
            // Log the error from the server
            console.error('notifications:', data.error);
            throw new Error('failed to clear notification');
        }
    })
    .catch(error => {
        console.error('final error', error);
    });
}