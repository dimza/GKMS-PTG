          <div class="panel panel-default plain panel-closed toggle showControls">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
              
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user>
                  <p class=avatar><img src=assets/img/avatars/support.png alt=@support></p>
                  <p class=chat-name>Administrator <span class=chat-time></span></p>
                  <p class=chat-txt>Using this form for your comments!</p>
                  <p class=chat-attach-file></p>
                </li>
              </ul>
            </div>
            <div class="panel-body p0">
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user style="padding: 8px;">
                  <p class=avatar><img src=assets/img/avatars/fm.png alt=@female></p>
                  <p class=chat-name>Sundari Sukoco <span class=chat-time>15 seconds ago</span></p>
                  <p class=chat-txt>Check the last activity in the KPI's.</p>
                  <p class=chat-attach-file></p>
                </li>
                <li class=chat-me style="padding: 10px; background: #f8f8f8;">
                  <p class=avatar><img src=assets/img/avatars/<?php echo $foto; ?> alt=@<?php echo $qem3; ?>></p>
                  <p class=chat-name><?php echo $qem2.' '.$qem3; ?> <span class=chat-time>10 seconds ago</span></p>
                  <p class=chat-txt>Ok i will check it out.</p>
                </li>
                <li class=chat-user style="padding: 8px;">
                  <p class=avatar><img src=assets/img/avatars/fm.png alt=@female></p>
                  <p class=chat-name>Sundari Sukoco <span class=chat-time>now</span></p>
                  <p class=chat-txt>Thank you, have a nice day!</p>
                </li>
              </ul>
            </div>
            <div class="panel-footer white-bg">
              <div class="chat-write chat-widget">
                <form action=# class=form-horizontal role=form>
                  <div class="form-group relative">
                    <textarea name=replymsg id=replymsg class="form-control elastic" rows=1></textarea>
                    <div class="pull-right mt10"><a href=# data-toggle=modal data-target=#myModal3 class="btn btn-primary">Post</a></div>
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
            </div>
          </div>
          <!-- End .panel -->