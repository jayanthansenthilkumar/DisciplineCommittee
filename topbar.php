<style>
    /* Topbar Styles */
    .topbar {
        position: fixed;
        top: 0;
        right: 0;
        left: var(--sidebar-width);
        height: var(--topbar-height);
        /* background-color: #E4E4E1; */
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.15) 0%, rgba(0, 0, 0, 0.15) 100%), radial-gradient(at top center, rgba(255, 255, 255, 0.40) 0%, rgba(0, 0, 0, 0.40) 120%) #989898;
        background-blend-mode: multiply, multiply;

        box-shadow: var(--card-shadow);
        display: flex;
        align-items: center;
        padding: 0 20px;
        transition: all 0.3s ease;
        z-index: 999;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .brand-logo {
        display: none;
        color: var(--primary-color);
        font-size: 24px;
        margin: 0 auto;
    }

    .sidebar.collapsed+.content .topbar {
        left: var(--sidebar-collapsed-width);
    }

    .hamburger {
        cursor: pointer;
        font-size: 20px;
        color: white;
    }

    .user-profile {
        margin-left: auto;
        color: white;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
        transition: var(--transition);
        border: 2px solid var(--primary-color);
    }

    .user-avatar:hover {
        transform: scale(1.1);
    }

    .online-indicator {
        position: absolute;
        width: 10px;
        height: 10px;
        background: var(--success-color);
        border-radius: 50%;
        bottom: 0;
        right: 0;
        animation: blink 1.5s infinite;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    /* User Menu Dropdown */
    .user-menu {
        position: relative;
        cursor: pointer;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        display: none;
        min-width: 200px;
    }

    .dropdown-menu.show {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-10px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .dropdown-item {
        padding: 10px 20px;
        color: var(--secondary-color);
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background: var(--light-bg);
        color: var(--primary-color);
    }

    /* User Profile Styles */
    .user-profile {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .online-indicator {
        position: absolute;
        width: 10px;
        height: 10px;
        background: var(--success-color);
        border-radius: 50%;
        bottom: 0;
        right: 0;
        border: 2px solid white;
        animation: blink 1.5s infinite;
    }
</style>


<div class="topbar">
    <div class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>

    <div class="user-profile">
        <div class="user-menu" id="userMenu">
            <div class="user-avatar">
                <img src="image/mkce_s.png" alt="User">
                <div class="online-indicator"></div>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" id="logoutbtn" href="javascript:void(0)">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>

    </div>
</div>

<script>
    const logout = document.getElementById("logoutbtn");
    logout.addEventListener("click", function () {
        window.location.href = "logout.php"
    })
</script>