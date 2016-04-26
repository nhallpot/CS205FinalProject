<script type="text/javascript">
            var imgObj = null;
            
            var spacePos = ['b1', [13,5],'b2',[52,5],'b3',[91,5],'b3-1',[91, 44], 'b3-2', [91,83], 'b3-3', [91,122], 'b3-4', [91, 161], 'b3-5', [91, 200], 
                            'b3-6', [91, 239], 'b4', [130,5], 'b5', [169,5], 'b5-1', [169,50], 'b6', [208,5], 'b7', [247,5], 'b8', [286,5], 'b9', [325,5],'b10', [364,5], 'b11', 
                            [403,5], 'b12', [442,5],'b13',[481,5],'b14', [520,5], 'b15', [559,5],'y1', [598,5],'y2', [598,44],'y3', [598,83],'y3-1', [559,83],
                            'y3-2', [520,83],'y3-3', [481,83],'y3-4', [442,83],'y3-5', [403,83],'y3-6', [364,83],'y4',[598,122],'y5',[598,161],'y5-1',[559, 161], 'y6',[598,200],
                            'y7',[598,239],'y8',[598,278],'y9',[598,317],'y10',[598,356],'y11',[598,395],'y12',[598,434],'y13',[598,473],'y14',[598,512],'y15',
                            [598,551],'g1',[598,590],'g2',[559,590],'g3',[520,590],'g3-1',[520,551],'g3-2',[520,512],'g3-3', [520,473],'g3-4',[520,434],'g3-5',
                            [520,395],'g3-6',[520,356],'g4',[481,590],'g5',[442,590],'g5-1', [442, 629], 'g6',[403,590],'g7',[364,590],'g8',[325,590],'g9',[286,590],'g10',[247,590],
                            'g11',[208,590],'g12', [169,590],'g13',[130,590],'g14',[91,590],'g15',[52,590],'r1',[13,590],'r2',[13,551],'r3',[13,512],'r3-1',[52,512],
                            'r3-2',[91,512],'r3-3',[130,512],'r3-4',[169,512],'r3-5',[208,512],'r3-6',[247,512],'r4',[13,473],'r5',[13,434],'r5-1',[52, 434], 'r6',[13,395],'r7',
                            [13,356],'r8',[13,317],'r9',[13,278],'r10',[13,239],'r11',[13,200],'r12',[13,161],'r13',[13,122],'r14',[13,83],'r15',[13,44]]; 
            var arrayPos=0;
            var arrayIndex=0;
            function getCssProperty(elmId, property){
               var elem = document.getElementById(elmId);
               return window.getComputedStyle(elem,null).getPropertyValue(property);
            }
            function move(){
              var info = document.getElementById('movePawn').getAttribute('value').split(",");
              var pawn = info[0];
              var spaces = info[1];
              var newSpace = info[2].toLowerCase();
                
              // Set card 
              var card = "images/" + spaces + ".jpg";
              console.log(card);
              document.getElementById("card").style.src = card;
               imgObj = document.getElementById(pawn);
               imgObj.style.position= 'absolute'; 
              /*// If new space matches array, then set item to that space
              for (var y = 0; y < spacePos.length; y++) {
                if (spacePos[y] == newSpace) {
                  imgObj.style.left = spacePos[y+1][0] + 'px';
                  imgObj.style.top = spacePos[y+1][1] + 'px';
                }
              }*/
              // Find position that piece is currently at
                for (var x = 0; x < spacePos.length; x++) {
                  arr = spacePos[x];
                  if (Array.isArray(arr)) {
                    if (arr[0] === parseInt(getCssProperty(pawn,'left')) && (arr[1] === parseInt(getCssProperty(pawn,'top')))) {
                          arrayIndex = x;
                    }
                  }
              }
              var i = 0;
              console.log(arrayIndex);
              // If it is at start, skip through for loop to move and place
              // at first index after start if it is a 1, 2, or 13 otherwise stay
              if (spacePos[arrayIndex-1].includes("5-1")) {
                console.log(spaces);
                if (spaces == 1 || spaces == 2 || spaces == 13) {
                  console.log("check");
                  arrayIndex -= 2;
                  i = spaces;  
                  imgObj.style.left = spacePos[arrayIndex][0] + 'px';
                  imgObj.style.top = spacePos[arrayIndex][1] + 'px';
                } else {
                  i = spaces;
                }
              }
              // If it'll pass home, skip over for loop
              if (spacePos[(arrayIndex-1)].includes("3-") && !spacePos[(arrayIndex-1) + 2*spaces].includes("3-")) {
                  i = spaces;
              }
              // Cycle through loop moving pawn 1 space at a time
              for (i; i < spaces; i++) {
                      var endOfBoard = false;
                      // if pawn is at end of board 
                      if (arrayIndex === spacePos.length - 1) {
                        endOfBoard = true;
                        arrayIndex = 1;
                      } 
                      // If pawn is near home stretch
                      else if (spacePos[(arrayIndex - 1) + 2].includes('3-')) {
                        // Check for correct color
                        if (pawn.charAt(0).toUpperCase() != spacePos[arrayIndex-1].charAt(0).toUpperCase()) {
                          arrayIndex += 12;
                        }
                      } 
                      // if pawn is near start
                      else if (spacePos[(arrayIndex - 1) + 2].includes('5-') && !spacePos[(arrayIndex - 1) + 2].includes('3-5')){
                        arrayIndex += 2;
                      }
                      // increase index by 2 and style
                      if (!endOfBoard) {
                        arrayIndex += 2;
                      }
                      imgObj.style.left = spacePos[arrayIndex][0] + 'px';
                      imgObj.style.top = spacePos[arrayIndex][1] + 'px';
                      
                }
                if(spacePos[arrayIndex-1].includes('b2')||spacePos[arrayIndex-1].includes('y2')||spacePos[arrayIndex-1].includes('g2')||spacePos[arrayIndex-1].includes('r2')){
                    if (pawn.charAt(0).toUpperCase() != spacePos[arrayIndex-1].charAt(0).toUpperCase()) {
                        imgObj.style.left = spacePos[arrayIndex+18][0] + 'px';
                        imgObj.style.top = spacePos[arrayIndex+18][1] + 'px';
                    }
                  }
                if(spacePos[arrayIndex-1].includes('b10')||spacePos[arrayIndex-1].includes('y10')||spacePos[arrayIndex-1].includes('g10')||spacePos[arrayIndex-1].includes('r10')){
                    if (pawn.charAt(0).toUpperCase() != spacePos[arrayIndex-1].charAt(0).toUpperCase()) {
                      imgObj.style.left = spacePos[arrayIndex+8][0] + 'px';
                      imgObj.style.top = spacePos[arrayIndex+8][1] + 'px';
                    }
                  }
              // Save position
              savePosition();
            }
            function savePosition() {
              var pawns = [];
              var x = 0;
              var y = 0;
              // Get position that items are currently at
              while (x < 4 && y < 4) {
                var pawn = 'R' + (x+1).toString();
                var left = getCssProperty(pawn, 'left').replace("px","");
                var top = getCssProperty(pawn, 'top').replace("px","")
                pawns.push([left, top]);
                pawn = 'Y' + (y+1).toString();
                left = getCssProperty(pawn, 'left').replace("px","");
                top = getCssProperty(pawn, 'top').replace("px","")
                pawns.push([left, top]);
                x++;
                y++;
              }
              // Store them in session
              sessionStorage.setItem("pawns", JSON.stringify(pawns));
            }
            function clear() {
              sessionStorage.clear();
            }
      </script>