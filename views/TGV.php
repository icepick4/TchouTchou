<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');

    $wagon = intval($_GET['id']);
    ?>
    

<div id="train_simple">
    <h2>wagon simple</h2>
    <div class="wagon <?= $wagon ?>">
    <div class="row seatRow">
        <div class="seat " id="1">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">1</p>
        </div>
        <div class="seat " id="2">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">2</p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">   
            </svg>
        </div>
        <div class="seat" id="3">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">3</p>
        </div>
        <div class="seat" id="4">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">4</p>
        </div>
    </div>
    <div class="row tableRow">
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table">
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table"> 
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
    </div>
    <div class="row seatRow reverse">
        <div class="seat" id="5">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">5</p>
        </div>
        <div class="seat" id="6">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">6</p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="7">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">7</p>
        </div>
        <div class="seat" id="8">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">8</p>
        </div>
    </div>
    <div class="row baggageRow">
        <svg width="148" height="145" viewBox="0 0 148 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="148" height="145" rx="12" fill="#595550"/>
            <rect x="35" y="53" width="78" height="43" rx="4" fill="#231B13"/>
            <path d="M64 53V47C64 45.3431 65.3431 44 67 44H81C82.6569 44 84 45.3431 84 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
        </svg>
        <svg width="148" height="145" viewBox="0 0 148 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="148" height="145" rx="12" fill="#595550"/>
            <rect x="35" y="53" width="78" height="43" rx="4" fill="#231B13"/>
            <path d="M64 53V47C64 45.3431 65.3431 44 67 44H81C82.6569 44 84 45.3431 84 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
        </svg>
    </div>
    <div class="row seatRow">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row seatRow">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row seatRow">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row seatRow">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row tableRow">
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table">
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table"> 
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
    </div>
    <div class="row seatRow reverse">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row seatRow">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row tableRow">
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table">
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
        <svg width="69" height="145" viewBox="0 0 69 145" fill="none" xmlns="http://www.w3.org/2000/svg" class="table"> 
            <rect width="69" height="145" rx="12" fill="#595550"/>
            <path d="M34.5 0V72.25M34.5 145V144.5V72.5M34.5 72.25H69M34.5 72.25V72.5M34.5 72.5H0" stroke="#4A4A4A"/>
        </svg>
    </div>
    <div class="row seatRow reverse">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row seatRow reverse">
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="hallway" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
        <div class="seat" id="">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber"></p>
        </div>
    </div>
    <div class="row baggageRow">
        <svg width="198" height="140" viewBox="0 0 198 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="198" height="140" rx="12" fill="#595550"/>
            <rect x="60" y="53" width="78" height="43" rx="4" fill="#231B13"/>
            <path d="M89 53V47C89 45.3431 90.3431 44 92 44H106C107.657 44 109 45.3431 109 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
        </svg>
        <svg width="198" height="140" viewBox="0 0 198 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="198" height="140" rx="12" fill="#595550"/>
            <rect x="60" y="53" width="78" height="43" rx="4" fill="#231B13"/>
            <path d="M89 53V47C89 45.3431 90.3431 44 92 44H106C107.657 44 109 45.3431 109 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
        </svg>
    </div>
    <div class="row endRow">
        <svg width="27" height="57" viewBox="0 0 27 57" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.5 3L13.5 54M13.5 54C14.1462 53.3625 20.7692 46.8281 24 43.6406M13.5 54L3 43.6406" stroke="white" stroke-opacity="0.2" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <svg width="295" height="145" viewBox="0 0 295 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 12C0 5.37258 5.37258 0 12 0H295V105C295 127.091 277.091 145 255 145H0V12Z" fill="#595550"/>
            <path d="M127.365 59.728L120.777 85H113.325L109.293 68.368L105.117 85H97.6654L91.2574 59.728H97.8454L101.481 78.124L105.981 59.728H112.749L117.069 78.124L120.741 59.728H127.365ZM129.409 72.328C129.409 69.832 129.949 67.612 131.029 65.668C132.109 63.7 133.609 62.176 135.529 61.096C137.473 59.992 139.669 59.44 142.117 59.44C145.117 59.44 147.685 60.232 149.821 61.816C151.957 63.4 153.385 65.56 154.105 68.296H147.337C146.833 67.24 146.113 66.436 145.177 65.884C144.265 65.332 143.221 65.056 142.045 65.056C140.149 65.056 138.613 65.716 137.437 67.036C136.261 68.356 135.673 70.12 135.673 72.328C135.673 74.536 136.261 76.3 137.437 77.62C138.613 78.94 140.149 79.6 142.045 79.6C143.221 79.6 144.265 79.324 145.177 78.772C146.113 78.22 146.833 77.416 147.337 76.36H154.105C153.385 79.096 151.957 81.256 149.821 82.84C147.685 84.4 145.117 85.18 142.117 85.18C139.669 85.18 137.473 84.64 135.529 83.56C133.609 82.456 132.109 80.932 131.029 78.988C129.949 77.044 129.409 74.824 129.409 72.328Z" fill="#231B13"/>
        </svg>
    </div>
</div>

