<div id="statsDuringTest" class="std">
      <p id="Correct" style="color: #06D6A0;">0</p>
      <p>|</p>
      <p id="Error" style="color: #EF476F;">0</p>
</div>
<div class="userInterface">
      <input
        type="text"
        onfocus="clearUserInput()"
        onkeypress="startTimer()"
        id="input"
        autocomplete="off"
      />
      <p id="countdown" class="timer">1:00</p>
      <button class="reloadButton" onclick="resetTest()">
        <i class="fas fa-sync-alt" id="reloadIcon"></i>
      </button>
      <div class="divider"></div>
    </div>
