<?php
echo <<< _END
\n
        <aside id="sidebar">
            <div class="container">
                <form id="schedule-form" action="schedule-form.php" method="POST" autocomplete="off">
                    <input type="text" name="fullname" id="schedule-form-fullname" placeholder="Full Name">
                    <input type="email" name="email" id="shcedule-form-email" placeholder="Phone Number">
                    <input type="text" name="address" id="shcedule-form-address" placeholder="Full Address">
                </form>
            </div>
        </aside>\n
_END;
?>