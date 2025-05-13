<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Bus Management Tabs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
        }

        .custom-tabs {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
        }

        .nav-tabs {
            border: none;
            gap: 10px;
            padding: 6px;
            background: #f8f9fd;
            border-radius: 12px;
        }

        .nav-link {
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 20px !important;
            font-weight: 600 !important;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            z-index: 1;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            z-index: -1;
            transform: translateY(100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::before {
            transform: translateY(0);
        }

        .nav-link.active {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        /* Add Bus Tab Styling */
        #add-bus-tab {
            background: linear-gradient(135deg, #FF6B6B, #FFE66D);
            color: #fff;
        }

        #add-bus-tab:not(.active) {
            background: #fff;
            color: #FF6B6B;
        }

        #add-bus-tab:hover:not(.active) {
            background: linear-gradient(135deg, #FF6B6B, #FFE66D);
            color: #fff;
        }

        /* Edit Bus Tab Styling */
        #edit-bus-tab {
            background: linear-gradient(135deg, #4E65FF, #92EFFD);
            color: #fff;
        }

        #edit-bus-tab:not(.active) {
            background: #fff;
            color: #4E65FF;
        }

        #edit-bus-tab:hover:not(.active) {
            background: linear-gradient(135deg, #4E65FF, #92EFFD);
            color: #fff;
        }

        .tab-icon {
            margin-right: 8px;
            font-size: 1.1em;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .tab-icon {
            transform: rotate(15deg) scale(1.1);
        }

        .nav-link.active .tab-icon {
            animation: bounce 0.5s ease infinite alternate;
        }

        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-2px); }
        }

        .tab-content {
            padding: 20px;
            margin-top: 15px;
            background: #fff;
            border-radius: 12px;
            min-height: 200px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: relative;
        }

        .tab-pane {
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.4s ease-out;
        }

        .tab-pane.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Glowing effect on active tab */
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 3px;
            background: inherit;
            border-radius: 6px;
            filter: blur(2px);
            animation: glow 1.5s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { opacity: 0.6; width: 40%; }
            to { opacity: 1; width: 55%; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="custom-tabs">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="add-bus-tab" data-bs-toggle="tab" 
                            data-bs-target="#add-bus" type="button" role="tab">
                        <i class="fas fa-bus tab-icon"></i>Add Bus
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="edit-bus-tab" data-bs-toggle="tab" 
                            data-bs-target="#edit-bus" type="button" role="tab">
                        <i class="fas fa-edit tab-icon"></i>Edit Bus
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-bus" role="tabpanel">
                    <?php include 'bus.php'; ?>
                </div>
                <div class="tab-pane fade" id="edit-bus" role="tabpanel">
                    <?php include 'editbus.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>