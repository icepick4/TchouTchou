<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS ?>buy_place.js type="module" defer></script>

<!--  Début de la page -->
<h1><?= SELECT_SEATS ?></h1>
<div id="train_simple">
    <h2>wagon simple</h2>
    <div class="wagon 1">
    <div class="row seatRow">
        <div class="seat reserved" id="1">
            <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
            </svg>
            <p class="seatNumber">1</p>
        </div>
        <div class="seat selected" id="2">
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
</div>
<div id="train_duplex">
    <h2>wagon duplex</h2>
    <div class="wagon 3">
            <div class="row seatRow">
                <div class="seat" id="1">
                    <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                        <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
                    </svg>
                    <p class="seatNumber">1</p>
                </div>
                <div class="seat" id="2">
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
            <div class="row baggageRow custom">
                <div class="halfRow">
                    <div class="reverse">
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
                    <svg width="148" height="145" viewBox="0 0 148 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="148" height="145" rx="12" fill="#595550"/>
                    <rect x="35" y="53" width="78" height="43" rx="4" fill="#231B13"/>
                    <path d="M64 53V47C64 45.3431 65.3431 44 67 44H81C82.6569 44 84 45.3431 84 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
                    </svg>
                </div>
                <svg width="228" height="142" viewBox="0 0 228 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="228" height="142" rx="12" fill="#595550"/>
                    <rect x="75" y="53" width="78" height="43" rx="4" fill="#231B13"/>
                    <path d="M104 53V47C104 45.3431 105.343 44 107 44H121C122.657 44 124 45.3431 124 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="row downStairsRow">
                <svg width="295" height="150" viewBox="0 0 295 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0H255C277.091 0 295 17.9086 295 40V150H12C5.37258 150 0 144.627 0 138V0Z" fill="#595550"/>
                    <path d="M62 119H80.0373V106.377H97.5109V92.4348H114.233V79.8116H132.082V68.5072H148.992V54.3768H166.654V41H183M70.5 81L91.5 79M70.5 81L116.71 41.5333M70.5 81H69L75 60" stroke="#231B13" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <svg width="295" height="145" viewBox="0 0 295 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 12C0 5.37258 5.37258 0 12 0H295V105C295 127.091 277.091 145 255 145H0V12Z" fill="#595550"/>
                    <path d="M127.365 59.728L120.777 85H113.325L109.293 68.368L105.117 85H97.6654L91.2574 59.728H97.8454L101.481 78.124L105.981 59.728H112.749L117.069 78.124L120.741 59.728H127.365ZM129.409 72.328C129.409 69.832 129.949 67.612 131.029 65.668C132.109 63.7 133.609 62.176 135.529 61.096C137.473 59.992 139.669 59.44 142.117 59.44C145.117 59.44 147.685 60.232 149.821 61.816C151.957 63.4 153.385 65.56 154.105 68.296H147.337C146.833 67.24 146.113 66.436 145.177 65.884C144.265 65.332 143.221 65.056 142.045 65.056C140.149 65.056 138.613 65.716 137.437 67.036C136.261 68.356 135.673 70.12 135.673 72.328C135.673 74.536 136.261 76.3 137.437 77.62C138.613 78.94 140.149 79.6 142.045 79.6C143.221 79.6 144.265 79.324 145.177 78.772C146.113 78.22 146.833 77.416 147.337 76.36H154.105C153.385 79.096 151.957 81.256 149.821 82.84C147.685 84.4 145.117 85.18 142.117 85.18C139.669 85.18 137.473 84.64 135.529 83.56C133.609 82.456 132.109 80.932 131.029 78.988C129.949 77.044 129.409 74.824 129.409 72.328Z" fill="#231B13"/>
                </svg>
            </div>
        </div>
    <div class="wagon 2">
        <div class="row seatRow">
            <div class="seat" id="1">
                <svg width="69" height="70" viewBox="0 0 69 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25 1.5H38H44C56.9787 1.5 67.5 12.0213 67.5 25V45C67.5 57.9787 56.9787 68.5 44 68.5H38H25C12.0213 68.5 1.5 57.9787 1.5 45V25C1.5 12.0213 12.0213 1.5 25 1.5Z" stroke="#EDE9E2" stroke-width="3"/>
                    <path d="M25 3.75H28.9528C19.2211 7.0999 12.25 15.6992 12.25 25.8571V44.1429C12.25 54.3008 19.2211 62.9001 28.9528 66.25H25C11.5424 66.25 0.75 56.2905 0.75 44.1429V25.8571C0.75 13.7095 11.5424 3.75 25 3.75Z" fill="#EDE9E2" stroke="#EDE9E2" stroke-width="1.5"/>
                </svg>
                <p class="seatNumber">1</p>
            </div>
            <div class="seat" id="2">
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
        <div class="row baggageRow custom">
            <svg width="228" height="142" viewBox="0 0 228 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="228" height="142" rx="12" fill="#595550"/>
                <rect x="75" y="53" width="78" height="43" rx="4" fill="#231B13"/>
                <path d="M104 53V47C104 45.3431 105.343 44 107 44H121C122.657 44 124 45.3431 124 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
            </svg>
            <div class="halfRow">
                <svg width="148" height="145" viewBox="0 0 148 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="148" height="145" rx="12" fill="#595550"/>
                    <rect x="35" y="53" width="78" height="43" rx="4" fill="#231B13"/>
                    <path d="M64 53V47C64 45.3431 65.3431 44 67 44H81C82.6569 44 84 45.3431 84 47V53" stroke="#231B13" stroke-width="5" stroke-linecap="round"/>
                </svg>
                <div>
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
        <div class="row exitRow">
            <svg width="27" height="57" viewBox="0 0 27 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 3L13.5 54M13.5 54C14.1462 53.3625 20.7692 46.8281 24 43.6406M13.5 54L3 43.6406" stroke="white" stroke-opacity="0.2" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg width="27" height="57" viewBox="0 0 27 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 3L13.5 54M13.5 54C14.1462 53.3625 20.7692 46.8281 24 43.6406M13.5 54L3 43.6406" stroke="white" stroke-opacity="0.2" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="upStairsRow">
            <svg width="295" height="383" viewBox="0 0 295 383" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0H255C277.091 0 295 17.9086 295 40V343C295 365.091 277.091 383 255 383H0V0Z" fill="#595550"/>
                <path d="M127.365 297.728L120.777 323H113.325L109.293 306.368L105.117 323H97.6654L91.2574 297.728H97.8454L101.481 316.124L105.981 297.728H112.749L117.069 316.124L120.741 297.728H127.365ZM129.409 310.328C129.409 307.832 129.949 305.612 131.029 303.668C132.109 301.7 133.609 300.176 135.529 299.096C137.473 297.992 139.669 297.44 142.117 297.44C145.117 297.44 147.685 298.232 149.821 299.816C151.957 301.4 153.385 303.56 154.105 306.296H147.337C146.833 305.24 146.113 304.436 145.177 303.884C144.265 303.332 143.221 303.056 142.045 303.056C140.149 303.056 138.613 303.716 137.437 305.036C136.261 306.356 135.673 308.12 135.673 310.328C135.673 312.536 136.261 314.3 137.437 315.62C138.613 316.94 140.149 317.6 142.045 317.6C143.221 317.6 144.265 317.324 145.177 316.772C146.113 316.22 146.833 315.416 147.337 314.36H154.105C153.385 317.096 151.957 319.256 149.821 320.84C147.685 322.4 145.117 323.18 142.117 323.18C139.669 323.18 137.473 322.64 135.529 321.56C133.609 320.456 132.109 318.932 131.029 316.988C129.949 315.044 129.409 312.824 129.409 310.328Z" fill="#231B13"/>
                <path d="M62 131H80.0373V118.377H97.5109V104.435H114.233V91.8116H132.082V80.5072H148.992V66.3768H166.654V53H183M75.7158 94.8261L116.71 53.5333L117.239 53M117.239 53V70.3333M117.239 53H98.0745" stroke="#231B13" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</div>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
