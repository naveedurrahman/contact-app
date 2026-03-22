<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Task Created</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px 0;">
        <tr>
            <td align="center">

                <!-- Email Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#4f46e5; color:#ffffff; padding:20px; text-align:center;">
                            <h2 style="margin:0;">New Task Created</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:20px; color:#333333;">

                            <p style="margin:0 0 10px;">Hello,</p>

                            <p style="margin:0 0 20px;">
                                A new task has been created. Here are the details:
                            </p>

                            <!-- Task Details -->
                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="background:#f9fafb; font-weight:bold; width:150px;">Title:</td>
                                    <td>{{ $task->title }}</td>
                                </tr>
                                <tr>
                                    <td style="background:#f9fafb; font-weight:bold;">Description:</td>
                                    <td>{{ $task->description }}</td>
                                </tr>
                                
                            </table>

                            <p style="margin:20px 0 0;">
                                Thank you.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f9fafb; padding:15px; text-align:center; font-size:12px; color:#888;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>