require "import"
import "android.app.*"
import "android.os.*"
import "android.widget.*"
import "android.view.*"
import "android.net.*"
import "android.content.*"
import "android.graphics.*"
import "android.graphics.drawable.*"
import "android.provider.*"
import "com.downloader.*"
URLserver="https://deadalose.000webhostapp.com/"

function LoginLY()
  layout={
    LinearLayout;
    layout_width="fill";
    layout_height="fill";
    gravity="center";
    orientation="vertical";
    backgroundColor="0xFFFFFFFF";
    {
      LinearLayout;
      gravity="center";
      layout_width="wrap";
      --layout_height="-900dp";
    };
    {
      TextView;
      layout_marginTop="-150dp";
    };
     {
      ImageView;
      layout_margin="60dp";
      layout_height="wrap";
      layout_width="60%w";
      layout_gravity="center";
      id="";
      src="src/logo.png";
     };
    {
      TextView;
      layout_marginTop="-180dp";
    };
      {
        CardView;
        layout_height="wrap";
        layout_width="45%h";
        radius="25dp";
        layout_gravity="center";
        backgroundColor="0xFF0090FF";
        {
          LinearLayout;
          orientation="vertical";
          gravity="center";
          layout_width="fill";
          layout_height="fill";
          {
            LinearLayout;
            layout_height="2.5%h";
            layout_width="fill";
          };
          {
            LinearLayout;
            orientation="horizontal";
            gravity="center";
            layout_width="fill";
            layout_height="fill";
            {
              LinearLayout;
              layout_height="wrap";
              layout_width="wrap";
              {
                CardView;
                layout_height="6.3%h";
                backgroundColor="0xFF757479";
                layout_width="33.3%h";
                {
                  LinearLayout;
                  layout_height="fill";
                  gravity="center";
                  layout_width="fill";
                  {
                    LinearLayout;
                    orientation="horizontal";
                    layout_width="33%h";
                    gravity="center";
                    layout_height="6%h";
                    backgroundColor="0xFF202125";
                    {
                      EditText;
                      layout_height="wrap";
                      layout_width="31%h";
                      hint="Username";
                      inputType="textVisiblePassword";
                      backgroundColor="none";
                      hintTextColor="0xB3FFFFFF";
                      textColor="0xFFFFFFFF";
                      textSize="16sp";
                      id="txtUsername";
                    };
                  };
                };
              };
            };
            {
              LinearLayout;
              layout_height="fill";
              layout_width="1%h";
            };
            {
              CardView;
              id="btnPaste";
              layout_height="6%h";
              backgroundColor="0xFFFFFFFF";
              layout_width="6%h";
              {
                LinearLayout;
                layout_height="fill";
                layout_width="fill";
                gravity="center";
                {
                  ImageView;
                  layout_height="3%h";
                  layout_width="3%h";
                  src="res/drawable/content-paste.png";
                  colorFilter="0xFF000000";
                };
              };
            };
          };
          {
            LinearLayout;
            layout_height="1%h";
            layout_width="fill";
          };
          {
            LinearLayout;
            layout_height="wrap";
            layout_width="wrap";
            {
              CardView;
              layout_height="6.3%h";
              backgroundColor="0xFF757479";
              layout_width="40.3%h";
              {
                LinearLayout;
                layout_height="fill";
                gravity="center";
                layout_width="fill";
                {
                  LinearLayout;
                  orientation="horizontal";
                  layout_width="40%h";
                  gravity="center";
                  layout_height="6%h";
                  backgroundColor="0xFF202125";
                  {
                    EditText;
                    layout_height="wrap";
                    layout_width="38%h";
                    hint="Password";
                    inputType="textPassword";
                    backgroundColor="none";
                    hintTextColor="0xB3FFFFFF";
                    textColor="0xFFFFFFFF";
                    textSize="16sp";
                    id="txtPassword";
                  };
                };
              };
            };
          };
          {
            LinearLayout;
            layout_height="2%h";
            layout_width="fill";
          };
          {
            CardView;
            radius="25dp";
            layout_width="wrap";
            layout_height="wrap";
            {
              TextView;
              layout_height="6%h";
              layout_width="20.5%h";
              id="btnLogin";
              backgroundColor="0xFFFFFFFF";
              gravity="center";
              LetterSpacing="0.5";
              textColor="0xFF000000";
              textSize="14sp";
              text="LOGIN";
            };
          };
          {
            LinearLayout;
            layout_height="2%h";
            layout_width="fill";
          };
          {
            LinearLayout;
            layout_height="wrap";
            layout_width="wrap";
            orientation="horizontal";
            {
              TextView;
              layout_height="wrap";
              layout_width="wrap";
              gravity="center";
              textColor="0xFF000000";
              textSize="13sp";
              text="Not have key?";
            };
            {
              TextView;
              layout_height="wrap";
              id="txtFreeKey";
              gravity="center";
              layout_width="wrap";
              textColor="0xFFFFFFFF";
              textSize="13sp";
              text=" Get key";
            };
          };
          {
            LinearLayout;
            layout_height="2.5%h";
            layout_width="fill";
          };
        };
      };
    };
  


  activity.setTheme(R.AndLua10)
  activity.ActionBar.hide()
  --[[activity.setTitle("ADMIN Panel")
activity.getActionBar().setSubtitle("LOGIN")
]]

  activity.ActionBar.setBackgroundDrawable(ColorDrawable(0x20FFFFFF))
  activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFFFFFFFF);
  activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
  activity.setContentView(loadlayout(layout))

  
  
  txtFreeKey.setTypeface(Typeface.DEFAULT_BOLD)
  btnLogin.setTypeface(Typeface.DEFAULT_BOLD)

  if Settings.canDrawOverlays(activity) then else intent=Intent("android.settings.action.MANAGE_OVERLAY_PERMISSION");
    intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
  end

  btnPaste.onClick=function()
    local copiedUserPass = activity.getSystemService(Context.CLIPBOARD_SERVICE).getText()
    if copiedUserPass== "" then
      Toast.makeText(activity, "Please copy text from website!",Toast.LENGTH_SHORT).show()
     else
      if string.find(copiedUserPass,":") then
        local copiedUser,copiedPass = copiedUserPass:match("([^,]+):([^,]+)")
        txtUsername.setText(copiedUser)
        txtPassword.setText(copiedPass)
       else
        Toast.makeText(activity, "Please copy text from website!",Toast.LENGTH_SHORT).show()
      end
    end
  end
--AUTO FILL LOGIN
local pref = activity.getSharedPreferences("example", Context.MODE_PRIVATE)
loginuser = pref.getString("loginuser", "")
loginpass = pref.getString("loginpass", "")

txtUsername.setText(loginuser)
txtPassword.setText(loginpass)


  btnLogin.onClick=function()
    key=txtUsername.text
    local pref = activity.getSharedPreferences("example", Context.MODE_PRIVATE)
    local save = pref.edit()
    save.putString("loginuser", key)
     save.commit()
     key=txtPassword.text
  local pref = activity.getSharedPreferences("example", Context.MODE_PRIVATE)
  local save = pref.edit()
  save.putString("loginpass", key)
  save.commit()
    local username = txtUsername.text
    local password = txtPassword.text
    import "android.provider.Settings$Secure"
    local uuid = Secure.getString(activity.getContentResolver(), Secure.ANDROID_ID)
    if !username || username == "" or !password || password == "" then
      Toast.makeText(activity, "Nothing can be empty!",Toast.LENGTH_SHORT).show()
     else
      local dl=ProgressDialog.show(activity,nil,'Please wait!')
      dl.show()
      Http.post(URLserver.."login.php","username="..username.."&password="..password.."&uuid="..uuid,nil,"utf8",nil,function(code,body,cookie,header)
        local a=0
        local tt=Ticker()
        tt.start()
        tt.onTick=function()
          a=a+1
          if a==5 then
            dl.dismiss()
            tt.stop()
            if code == 200 then
              if body:match("Success") then
                Toast.makeText(activity, "Login success!",Toast.LENGTH_SHORT).show()
                if body:match(";(.-);")
                  EXPIREDLOGIN=string.match(tostring(body),";(.-);")
                  LoaderLY()
                 else
                  EXPIREDLOGIN="5 minutes"
                  LoaderLY()
                end
               elseif body:match("Expired") then
                Toast.makeText(activity, "Key has been expired!",Toast.LENGTH_SHORT).show()
               elseif body:match("Device changed") then
                Toast.makeText(activity, "Device has changed!",Toast.LENGTH_SHORT).show()
               else
                Toast.makeText(activity, "Login failed!",Toast.LENGTH_SHORT).show()
              end
             else
              Toast.makeText(activity, "Can't connect to server!",Toast.LENGTH_SHORT).show()
            end
          end
        end
      end);
    end
  end


  txtFreeKey.onClick=function()
    GetkeyLY()
  end

end

LoginLY()

function GetkeyLY()
getkey={
  LinearLayout;
  layout_height="fill";
  backgroundColor="0xFF131416";
  layout_width="fill";
  {
    LinearLayout;
    orientation="vertical";
    layout_width="fill";
    layout_height="fill";
    {
      LinearLayout;
      orientation="vertical";
      layout_width="fill";
      background="res/drawable/header.png";
      layout_height="wrap";
      gravity="center";
      {
        LinearLayout;
        layout_height="2%h";
        layout_width="fill";
      };
      {
        TextView;
        layout_height="wrap";
        id="headerTitle";
        layout_width="wrap";
        textColor="0xFFFFFFFF";
        textSize="25sp";
        text="Free Key";
      };
      {
        LinearLayout;
        layout_height="1%h";
        layout_width="fill";
      };
      {
        TextView;
        layout_height="wrap";
        id="headerSubtitle";
        layout_width="wrap";
        textColor="0xFFFFFFFF";
        textSize="15sp";
        text="Get Key";
      };
      {
        LinearLayout;
        layout_height="2%h";
        layout_width="fill";
      };
    };
    {
      LinearLayout;
      layout_height="2.5%h";
      layout_width="fill";
    };
    {
      CardView;
      layout_height="wrap";
      layout_width="45%h";
      radius="25dp";
      layout_gravity="center";
      backgroundColor="0xFF202125";
      {
        LinearLayout;
        layout_margin="2.5%h";
        orientation="vertical";
        layout_width="fill";
        layout_height="fill";
        {
          CardView;
          radius="25dp";
          layout_width="fill";
          layout_height="fill";
          {
            LuaWebView;
            id="getkeyView";
            layout_width="fill";
            layout_height="40%h";
          };
        };
      };
    };
    {
      LinearLayout;
      layout_width="fill";
      layout_height="fill";
      layout_margin="5%h";
      gravity="center_horizontal|bottom";
      {
        CardView;
        radius="25dp";
        backgroundColor="0xFFFFFFFF";
        id="btnLogout";
        layout_width="15%h";
        layout_height="5%h";
        {
          LinearLayout;
          orientation="horizontal";
          layout_height="fill";
          layout_width="fill";
          gravity="center";
          {
            ImageView;
            src="res/drawable/logout-variant.png";
            layout_height="4%h";
            colorFilter="0xFF000000";
            layout_width="4%h";
          };
          {
            LinearLayout;
            layout_width="1.5%h";
            layout_height="fill";
          };
          {
            TextView;
            id="txtLogout";
            layout_height="wrap";
            text="Back";
            textSize="15sp";
            layout_width="wrap";
            textColor="0xFF000000";
          };
        };
      };
    };
  };
};


  activity.setTheme(R.AndLua10)
  activity.ActionBar.hide()
  --[[activity.setTitle("ADMIN Panel")
activity.getActionBar().setSubtitle("LOGIN")
]]
  activity.ActionBar.setBackgroundDrawable(ColorDrawable(0xFF202125))
  activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFF202125);
  activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
  activity.setContentView(loadlayout(getkey))

  headerTitle.setTypeface(Typeface.DEFAULT_BOLD)
  headerSubtitle.setTypeface(Typeface.DEFAULT_BOLD)
  txtLogout.setTypeface(Typeface.DEFAULT_BOLD)

  getkeyView.getSettings().setSupportMultipleWindows(true)
  getkeyView.getSettings().setJavaScriptEnabled(true)
  getkeyView.getSettings().setJavaScriptCanOpenWindowsAutomatically(false)
  getkeyView.getSettings().setDomStorageEnabled(true)
  getkeyView.getSettings().setAppCacheMaxSize(8388608)
  getkeyView.getSettings().setAppCachePath(activity.getCacheDir().getAbsolutePath())
  getkeyView.getSettings().setAllowFileAccess(true)
  getkeyView.getSettings().setAppCacheEnabled(true)
  getkeyView.getSettings().setLoadsImagesAutomatically(true)
  getkeyView.getSettings().setBlockNetworkImage(false)
  getkeyView.setHapticFeedbackEnabled(true)
  getkeyView.loadUrl(URLserver.."index.php")
  getkeyView.getTitle()
  getkeyView.getUrl()
  getkeyView.requestFocusFromTouch()
  getkeyView.getSettings().setSupportZoom(true)

  btnLogout.onClick=function()
    LoginLY()
  end

end

--------------------refreshloader-------------

CustomToast={
  LinearLayout;
  orientation="vertical";
  layout_width="fill";
  layout_height="wrap";
  {
    CardView;
    radius="10dp";
    layout_width="wrap";
    layout_marginRight="30dp";
    backgroundColor="0xFFFFFFFF";
    layout_marginTop="25dp";
    layout_height="wrap";
    layout_marginBottom="25dp";
    layout_marginLeft="30dp";
    {
      LinearLayout;
      orientation="horizontal";
      layout_width="match_parent";
      layout_height="match_parent";
      gravity="center";
      {
        CircleImageView;
        layout_width="30dp";
        src="icon.png";
        layout_height="30dp";
        layout_margin="10px";
      };
      {
        TextView;
        id="txtToast";
        textColor="0xFF000000";
        layout_width="match_parent";
        layout_height="wrap_content";
        padding="10dp";
        gravity="center";
      };
    };
  };
};

function LoaderLY()
  loader={
    LinearLayout;
    layout_height="fill";
    backgroundColor="0xFFFFFFFF";
    layout_width="fill";
    {
      LinearLayout;
      orientation="vertical";
      layout_width="fill";
      layout_height="fill";
      {
        LinearLayout;
        orientation="vertical";
        layout_width="fill";
        background="0xFF0090FF";
        layout_height="wrap";
        gravity="center";
        {
          LinearLayout;
          layout_height="2%h";
          layout_width="fill";
        };
        {
          TextView;
          layout_height="wrap";
          id="headerTitle";
          layout_width="wrap";
          textColor="0xFF0090FF";
          textSize="25sp";
          text="Loader V2.0";
        };
        {
          LinearLayout;
          layout_height="1%h";
          layout_width="fill";
        };
        {
          TextView;
          layout_height="wrap";
          id="headerSubtitle";
          layout_width="wrap";
          textColor="0xFF0090FF";
          textSize="15sp";
          text="Data Loader";
        };
        {
          LinearLayout;
          layout_height="2%h";
          layout_width="fill";
        };
      };
      {
        LinearLayout;
        layout_height="2.5%h";
        layout_width="fill";
      };
      {
        CardView;
        layout_height="wrap";
        layout_width="45%h";
        radius="25dp";
        layout_gravity="center";
        backgroundColor="0xFF0090FF";
        {
          LinearLayout;
          layout_margin="2.5%h";
          orientation="vertical";
          layout_width="fill";
          layout_height="fill";
          {
            TextView;
            id="titleInfoESP";
            layout_height="wrap";
            layout_width="wrap";
            textColor="0xFFFFFFFF";
            textSize="15sp";
            text="Download Data";
          };
          {
            LinearLayout;
            orientation="vertical";
            layout_width="fill";
            layout_height="fill";
            gravity="center";
            {
              LinearLayout;
              layout_height="2%h";
              layout_width="fill";
            };
            {
              CardView;
              radius="25dp";
              layout_width="wrap";
              layout_height="wrap";
              {
                Button;
                id="btnLaunchFile";
                layout_height="6%h";
                layout_width="25.5%h";
                backgroundColor="0xFFFFFFFF";
                gravity="center";
                textColor="0xFF000000";
                textSize="14sp";
                text="LAUNCH FILE";
              };
            };
            {
              LinearLayout;
              layout_height="2%h";
              layout_width="fill";
            };
            {
              CardView;
              radius="25dp";
              layout_width="wrap";
              layout_height="wrap";
              {
                Button;
                id="btnDownloadFile";
                layout_height="6%h";
                layout_width="25.5%h";
                backgroundColor="0xFFFFFFFF";
                gravity="center";
                textColor="0xFF000000";
                textSize="14sp";
                text="DOWNLOAD FILE V.2";
              };
            };
          };
        };
      };
    };
  };


  activity.setTheme(R.AndLua10)
  activity.ActionBar.hide()
  --[[activity.setTitle("ADMIN Panel")
activity.getActionBar().setSubtitle("LOGIN")
]]
  activity.ActionBar.setBackgroundDrawable(ColorDrawable(0xFF202125))
  activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFF202125);
  activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
  activity.setContentView(loadlayout(loader))
function TXTTOAST(toasttext)
  toast=Toast.makeText(activity,"",Toast.LENGTH_SHORT)
  .setView(loadlayout(CustomToast))
  .show()
  txtToast.setText(toasttext)
end
  headerTitle.setTypeface(Typeface.DEFAULT_BOLD)
  headerSubtitle.setTypeface(Typeface.DEFAULT_BOLD)
  titleInfoESP.setTypeface(Typeface.DEFAULT_BOLD)

  pkgName="com.android.deadalose"
  FILEDOWNLOAD="/storage/emulated/0/Android/data/"..pkgName.."/files/libUE4.so"
  Urls="https://deadalose.000webhostapp.com/Luck"

  if !io.open(FILEDOWNLOAD, "r") then
    btnLaunchFile.setBackgroundColor(0x86000000)
    btnLaunchFile.setTextColor(0xFF202125)
   else
  end

  btnLaunchFile.onClick=function()
    if !io.open(FILEDOWNLOAD, "r") then
      LoaderLY()
     else
      HomeLY()
    end
  end

  function onDestroy()
    if downloadIdOne~=nil and Status.RUNNING == PRDownloader.getStatus(downloadIdOne)
      PRDownloader.cancel(downloadIdOne);
    end
  end

  btnDownloadFile.onClick=function()
    if !io.open(FILEDOWNLOAD, "r") then
      if downloadIdOne==nil
        dl=ProgressDialog.show(activity,nil,'Downloading file!')
        dl.show()
        downloadIdOne = PRDownloader.download(Urls, "/storage/emulated/0/Android/data/"..pkgName.."/files", "libUE4.so").build()
        .setOnStartOrResumeListener({
          onStartOrResume=function()
          end
        })
        .start({
          onDownloadComplete=function()
            downloadIdOne=nil
            dl.dismiss()
            LoaderLY()
            Toast.makeText(this, "Download Success", Toast.LENGTH_SHORT).show();

          end,
          onError=function(error)
            dl.dismiss()
            downloadIdOne=nil
            LoaderLY()
            Toast.makeText(this, "Download Error"..tostring(error), Toast.LENGTH_SHORT).show();
          end
        });
       else
      end
     else
      Toast.makeText(activity, "File has been download!",Toast.LENGTH_SHORT).show()
    end
  end
end


function HomeLY()
  require "import"
  import "android.app.*"
  import "android.os.*"
  import "android.widget.*"
  import "android.view.*"
  import "http"
  import "AndLua"
  import "android.content.Context"
  import "android.content.Intent"
  import "android.provider.Settings"
  import "android.net.Uri"
  import "android.content.pm.PackageManager"
  import "android.graphics.Typeface"
  import "com.androlua.LuaDrawable"
  import "android.graphics.RectF"
  import "android.graphics.Color"
  import "android.graphics.Paint"
  import "android.graphics.Path"
  import "android.widget.CardView"
  import "android.graphics.drawable.GradientDrawable"

  home={
    LinearLayout;
    layout_height="fill";
    layout_width="fill";
    backgroundColor="0xFFFFFFFF";
    {
      LinearLayout;
      orientation="vertical";
      layout_height="fill";
      layout_width="fill";

      {
        LinearLayout;
        layout_width="fill";
        layout_height="3.5%h";
      };

      {
        LinearLayout;
        layout_width="fill";
        layout_height="3.5%h";
      };
      {
        CardView;
        id="di";
        layout_width="fill";
        layout_height="wrap";
        backgroundColor="0xFF0090FF";
        layout_gravity="center";
        layout_marginLeft="15dp";
        layout_marginRight="15dp";
        radius="3dp";
        cardElevation="0dp";
        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="vertical";
          layout_height="wrap";
          gravity="center";
          padding="5dp";
          {
            LinearLayout;
            layout_width="match_parent";
            backgroundColor="0x00000000";
            orientation="horizontal";
            layout_height="wrap";
            gravity="left|center";
            layout_marginLeft="2dp";
            {
              TextView;
              text="Data Info";
              layout_width="wrap";
              id="";
              gravity="center";
              layout_gravity="center";
              layout_height="wrap";
              textSize="15sp";
              textColor="0xFF008EFF";
            };
          };


          {
            LinearLayout;
            layout_width="match_parent";
            backgroundColor="0x00000000";
            orientation="horizontal";
            layout_height="wrap";
            gravity="left";
            layout_marginLeft="5dp";
            layout_margin="3dp";
            {
              TextView;
              text="App Version";
              layout_width="30%w";
              id="";
              gravity="left|center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="  : ";
              layout_width="wrap";
              layout_height="wrap";
              textSize="12sp";
              layout_gravity="center";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="Loader v2.0";
              layout_width="wrap";
              layout_marginLeft="5dp";
              gravity="center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
          };

          {
            LinearLayout;
            layout_width="match_parent";
            backgroundColor="0x00000000";
            orientation="horizontal";
            layout_height="wrap";
            gravity="left";
            layout_marginLeft="5dp";
            layout_margin="3dp";
            {
              TextView;
              text="Expired Time";
              layout_width="30%w";
              id="";
              gravity="left|center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="  : ";
              layout_width="wrap";
              layout_height="wrap";
              textSize="12sp";
              layout_gravity="center";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="";
              layout_width="wrap";
              id="txtExpired";
              layout_marginLeft="5dp";
              gravity="center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
          };
          {
            LinearLayout;
            layout_width="match_parent";
            backgroundColor="0x00000000";
            orientation="horizontal";
            layout_height="wrap";
            gravity="left";
            layout_marginLeft="5dp";
            layout_margin="3dp";
            {
              TextView;
              text="Device";
              layout_width="30%w";
              id="";
              gravity="left|center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="  : ";
              layout_width="wrap";
              layout_height="wrap";
              textSize="12sp";
              layout_gravity="center";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="";
              layout_width="wrap";
              id="model";
              layout_marginLeft="5dp";
              gravity="center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
          };

          {
            LinearLayout;
            layout_width="match_parent";
            backgroundColor="0x00000000";
            orientation="horizontal";
            layout_height="wrap";
            gravity="left";
            layout_marginLeft="5dp";
            layout_margin="3dp";
            {
              TextView;
              text="Status";
              layout_width="30%w";
              id="";
              gravity="left|center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
            {
              TextView;
              text="  : ";
              layout_width="wrap";
              layout_height="wrap";
              textSize="12sp";
              layout_gravity="center";
              textColor="0xFFFFFFFF";
            };
            {
              ProgressBar;
              layout_gravity="center";
              visibility="visible";
              layout_width="10dp";
              style="?android:attr/progressBarStyleSmall";
              id="pstatus";
              layout_height="10dp";
              layout_marginLeft="5dp";
            };
            {
              TextView;
              visibility="gone";
              text="";
              layout_width="wrap";
              id="status";
              layout_marginLeft="5dp";
              gravity="center";
              layout_height="wrap";
              textSize="12sp";
              textColor="0xFFFFFFFF";
            };
          };
        };
      };

      {
        LinearLayout;
        layout_width="fill";
        layout_height="2%h";
      };
      {
        LinearLayout;
        orientation="horizontal";
        layout_height="wrap";
        layout_width="fill";
        gravity="center";
        {
          CardView;
          id="start";
          layout_height="11%h";
          backgroundColor="0xFF0090FF";
          layout_gravity="center";
          layout_width="21.5%h";
          radius="10dp";
          {
            LinearLayout;
            orientation="vertical";
            layout_height="fill";
            layout_width="fill";
            gravity="center";
            {
              ImageView;
              src="src/play.png";
              layout_height="4%h";
              colorFilter="0xFFFFFFFF";
              layout_width="4%h";
            };
            {
              TextView;
              id="txtStartCheat";
              layout_height="wrap";
              text="Start Cheat";
              textSize="15sp";
              textColor="0xFFFFFFFF";
              layout_width="wrap";
            };
          };
        };
        {
          LinearLayout;
          layout_width="2%h";
          layout_height="fill";
        };
        {
          CardView;
          id="stop";
          layout_height="11%h";
          backgroundColor="0xFFFE0000";
          layout_gravity="center";
          layout_width="21.5%h";
          radius="10dp";
          {
            LinearLayout;
            orientation="vertical";
            layout_height="fill";
            layout_width="fill";
            gravity="center";
            {
              ImageView;
              src="src/pause.png";
              layout_height="4%h";
              colorFilter="0xFFFFFFFF";
              layout_width="4%h";
            };
            {
              TextView;
              id="txtStopCheat";
              layout_height="wrap";
              text="Stop Cheat";
              textSize="15sp";
              textColor="0xFFFFFFFF";
              layout_width="wrap";
            };
          };
        };
      };
    {
      LinearLayout;
      layout_width="fill";
      layout_height="2%h";
    };
    {
      LinearLayout;
      gravity="center";
      layout_width="fill";
      layout_height="wrap";
      {
        CardView;
        radius="10dp";
        backgroundColor="0xFF0090FF";
        layout_width="80%w";
        id="bgGameInfo";
        layout_gravity="center";
        layout_height="wrap";
        {
          LinearLayout;
          layout_margin="2.5%h";
          orientation="vertical";
          layout_width="fill";
          layout_height="fill";
          {
            TextView;
            textSize="15sp";
            textColor="0xFFFFFFFF";
            id="titleGameInfo";
            text="Game info";
            layout_width="wrap";
            layout_height="wrap";
          };
          {
            LinearLayout;
            layout_width="fill";
            layout_height="1%h";
          };
          {
            LinearLayout;
            gravity="center";
            orientation="horizontal";
            layout_width="wrap";
            layout_height="wrap";
            {
              TextView;
              textSize="13sp";
              textColor="0xFFFFFFFF";
              text="Version mode:";
              layout_width="wrap";
              layout_height="wrap";
            };
          };
          {
            LinearLayout;
            layout_width="fill";
            layout_height="0.5%h";
          };
          {
            RadioGroup;
            orientation="vertical";
            layout_width="wrap";
            layout_height="wrap";
            {
              RadioButton;
              layout_width="wrap";
              textColor="0xFFFFFFFF";
              id="global";
              text="Global";              
              layout_height="wrap";
            };
            {
              RadioButton;
              layout_width="wrap";
              textColor="0xFFFFFFFF";
              text="Vietnam";
              id="vietnam";
              layout_height="wrap";
            };
            {
              RadioButton;
              layout_width="wrap";
              textColor="0xFFFFFFFF";
              text="Korea";
              id="korea";
              layout_height="wrap";
            };
            {
              RadioButton;
              layout_width="wrap";
              textColor="0xFFFFFFFF";
              text="Taiwan";
              id="taiwan";
              layout_height="wrap";
            };
          };
        };
      };
    };
    {
      LinearLayout;
      layout_width="fill";
      layout_height="2%h";
    };
    {
      LinearLayout;
      gravity="center";
      orientation="horizontal";
      layout_width="fill";
      layout_height="wrap";
      {
        CardView;
        radius="10dp";
        layout_width="37.5%w";
        id="game";
        layout_gravity="center";
        backgroundColor="0xFF0090FF";
        layout_height="5%h";
        {
          LinearLayout;
          gravity="center";
          orientation="vertical";
          layout_width="fill";
          layout_height="fill";
          {
            TextView;
            textSize="15sp";
            textColor="0xFFFFFFFF";
            text="Launch Game";
            layout_width="wrap";
            layout_height="wrap";
          };
        };
      };
    };
    {
      LinearLayout;
      gravity="center|bottom";
      orientation="horizontal";
      layout_width="fill";
      layout_height="fill";
      {
        TextView;
        textSize="13sp";
        textColor="0xFF000000";
        id="titlePoweredBy";
        text="Powered by ";
        layout_width="wrap";
        layout_height="wrap";
      };
      {
        TextView;
        textSize="15sp";
        textColor="0xFFFF0000";
        id="poweredBy";
        text="Fly_Noreal";
        layout_width="wrap";
        layout_height="wrap";
      };
    };
  };
};


  activity.setTheme(R.AndLua18)
  activity.setContentView(loadlayout(home))
  activity.actionBar.hide()
  activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFFFFFFFF);
  activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
  ROOT=os.execute("su")
  if ROOT
   else
    print("Your Phone Not Rooted!")
  end

floattext={
  LinearLayout;
  layout_width="fill";
  layout_height="fill";
  {
    TextView;
    textSize="13sp";
    textColor="0xFFFF0000";
    gravity="center";
    id="jamsuk";
  };
}

  XonCex={
    LinearLayout;
    layout_height="fill";
    layout_width="fill";
    id="iconfloating";
    {
      CircleImageView;
      layout_width="50dp";
      src="icon.png";
      layout_height="50dp";
      layout_margin="10px";
      id="Win_minWindow";
    };
  };
  XonCe2={
    LinearLayout;
    layout_width="50dp";
    layout_height="50dp";
    {
      ImageView;
      layout_width="50dp";
      src="src/carsoff.png";
      id="Win_minWindow4";
      layout_height="50dp";
      padding="3dp";
    };
    {
      ImageView;
      layout_width="50dp";
      src="src/carson.png";
      id="Win_minWindow5";
      padding="3dp";
      layout_height="50dp";
    };
  };
  XonCe3={
    LinearLayout;
    layout_width="50dp";
    layout_height="50dp";
    {
      ImageView;
      layout_width="50dp";
      src="src/spedoff.png";
      id="Win_minWindow6";
      layout_height="50dp";
      padding="3dp";
    };

    {
      ImageView;
      layout_width="50dp";
      src="src/spedon.png";
      id="Win_minWindow7";
      padding="3dp";
      layout_height="50dp";
    };
  };

  XonCe4={
    LinearLayout;
    layout_width="50dp";
    layout_height="50dp";
    {
      ImageView;
      layout_width="60dp";
      src="src/flyingoff.png";
      id="Win_minWindow2";
      layout_height="60dp";
      padding="3dp";
    };

    {
      ImageView;
      layout_width="60dp";
      src="src/flyingon.png";
      id="Win_minWindow3";
      padding="3dp";
      layout_height="60dp";
    };
  };
  D42={
    LinearLayout;
    layout_width="50dp";
    layout_height="50dp";
    {
      ImageView;
      layout_width="50dp";
      src="src/spedoff.png";
      id="Win_minWindow9";
      layout_height="50dp";
      padding="3dp";
    };

    {
      ImageView;
      layout_width="50dp";
      src="src/spedon.png";
      id="Win_minWindow11";
      padding="3dp";
      layout_height="50dp";
    };
  };
  minlay5={
    LinearLayout;
    layout_width="50dp";
    layout_height="50dp";
    {
      ImageView;
      layout_width="50dp";
      src="src/spedoff.png";
      id="Win_minWindow207";
      layout_height="50dp";
    };

    {
      ImageView;
      layout_width="50dp";
      src="src/spedon.png";
      id="Win_minWindow20";
      layout_height="50dp";
    };
  };

  XonCeFloating={
    LinearLayout,
    layout_width="-1",
    layout_height="-1",
    id="menufloating";
    background="transparent";

    {
      LinearLayout;
      orientation="horizontal";
      layout_height="44%h";
      layout_width="fill";
      id="onee",
      background="transparent";
      layout_gravity="center";

      {
        LinearLayout;
        orientation="vertical";
        layout_height="44%h";
        layout_width="15%w";
        layout_width="13%w";
        layout_gravity="center";
        {

          ImageView;
          id="menu1",
          src="src/show.png";
          colorFilter="#ffffffff";
          padding="5dp";
          layout_height="5%h";
          layout_width="13%w";
        };
        {
          ImageView;
          id="menu2",
          src="src/ar.png";
          colorFilter="#ffffffff";
          padding="5dp";
          layout_height="5%h";
          layout_width="13%w";
        },
        {
          ImageView;
          id="menu3",
          src="src/run.png";
          colorFilter="#ffffffff";
          padding="5dp";
          layout_height="5%h";
          layout_width="13%w";
        },



      };
    };

    {
      LinearLayout,
      id="win_mainview",
      layout_width="75%w",
      layout_height="44%h";
      background="transparent";
      {
        LinearLayout;
        orientation="vertical";
        layout_height="44%h";
        layout_width="77%w";
        gravity="center";
        background="transparent",
        {
          LinearLayout;
          orientation="horizontal";
          layout_height="30dp";
          id="win_move",
          layout_width="70%w";
          gravity="center";
          background="transparent";
          {
            TextView;
            text=" Loader V2.0              "; -- MAIN TEXT IN FLOATING
            id="logo",
            textSize="17dp";
            textColor="0xffffffff";
          };
          {
            LinearLayout;
            layout_height="wrap";
            layout_width="30%w";
          };
          {
            ImageView;
            src="src/close.png";
            layout_height="17dp";
            layout_width="24dp";
            id="changeWindow",
            colorFilter="0xFF0090FF";
          };
        };

        {
          PageView,
          id="pg",
          layout_width="fill",
          layout_height="fill",

          pages={
            {
              LinearLayout;
              orientation="vertical";
              padding="5";
              layout_width="70%w";
              {
                ScrollView;
                layout_width="fill_parent";
                layout_height="fill",
                layout_gravity="center_horizontal";
                {
                  LinearLayout;
                  layout_height="-1";
                  layout_width="-1";
                  orientation="vertical";
                  {
                    LinearLayout;
                    id="_drawer_header";
                    layout_height="-2";
                    layout_width="-1";
                    orientation="vertical";
                    {
                      LinearLayout;
                      layout_height="-1";
                      layout_width="-1";
                      orientation="vertical";
                      padding="5";
                      {
                        LinearLayout;
                        orientation="horizontal";
                        layout_height="-1";
                        layout_width="-1";
                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };
                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        TextView,
                        textColor="0xFFFFFFFF";
                        layout_width="fill";
                        text="Wide View";
                        textSize="16dp";
                        layout_height="wrap";
                      };
                      {
                        SeekBar,
                        id ="bacod",
                        layout_width = "-1",
                        layout_height = "wrap_content",
                        max = "3",
                        progress = "0"
                      };

                      {
                        
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="fog";
                        text="No Fog ";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="sky";
                        text="Black Sky";
                        textSize="15dp";
                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };


                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="efexoff";
                        };
                        {
                          RadioButton;
                          text="Hit-efex";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="efexon";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };


                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="nightoff";
                        };
                        {
                          RadioButton;
                          text="Night Mode";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="nighton";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };


                    };
                  };
                };
              };
            };

            {
              LinearLayout;
              orientation="vertical";
              padding="5";
              {
                ScrollView;
                layout_width="fill_parent";
                layout_height="fill",
                layout_gravity="center_horizontal";
                {
                  LinearLayout;
                  layout_height="-1";
                  layout_width="-1";
                  orientation="vertical";
                  {
                    LinearLayout;
                    id="_drawer_header";
                    layout_height="-2";
                    layout_width="-1";
                    orientation="vertical";
                    {
                      LinearLayout;
                      layout_height="-1";
                      layout_width="-1";
                      orientation="vertical";
                      padding="5";
                      {
                        LinearLayout;
                        orientation="horizontal";
                        layout_height="-1";
                        layout_width="-1";
                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="norec";
                        text="No Recoil";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="les";
                        text="Less Recoil";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="shake";
                        text="No Shake";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="cros";
                        text="Small Crosshair";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="aim";
                        text="Aimbot";
                        textSize="15dp";
                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };


                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="instaoff";
                        };
                        {
                          RadioButton;
                          text="Insta-Hit";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="instaon";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };


                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="hsoff";
                        };
                        {
                          RadioButton;
                          text="HeadShoot";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="hson";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="sitscope";
                        text="Sit scope";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="pronescope";
                        text="Prone scope";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="standscope";
                        text="Stand scope";
                        textSize="15dp";
                      };
                    };
                  };
                };
              };
            };


            {
              LinearLayout;
              orientation="vertical";
              padding="5";
              {
                ScrollView;
                layout_width="fill_parent";
                layout_height="fill",
                layout_gravity="center_horizontal";
                {
                  LinearLayout;
                  layout_height="-1";
                  layout_width="-1";
                  orientation="vertical";
                  {
                    LinearLayout;
                    id="_drawer_header";
                    layout_height="-2";
                    layout_width="-1";
                    orientation="vertical";
                    {
                      LinearLayout;
                      layout_height="-1";
                      layout_width="-1";
                      orientation="vertical";
                      padding="5";
                      {
                        LinearLayout;
                        orientation="horizontal";
                        layout_height="-1";
                        layout_width="-1";
                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        textSize="16dp";
                        id="spedv1";
                        text="Flash V1 ";

                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="spedv2";
                        text="Flash V2 ";
                        textSize="16dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="spedv3";
                        text="Flash V3 ";
                        textSize="16dp";
                      };

                      {
                        CheckBox;
                        text="Fix Stuck";
                        textSize="16sp";
                        textColor="0xffffffff";
                        id="fixstuck";
                      };
                      {
                        CheckBox;
                        text="Fix Stuck V2";
                        textSize="16sp";
                        textColor="0xffffffff";
                        id="fixstuck2";
                      };


                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="coff";
                        };
                        {
                          RadioButton;
                          text="Flaying All Cars";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="con";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        RadioGroup;
                        layout_height="wrap";
                        layout_width="-1";
                        orientation="vertical";
                        {
                          RadioButton;
                          text="OFF";
                          Checked="true";

                          textSize="15sp";

                          textColor="0xffffffff";

                          id="foff";
                        };
                        {
                          RadioButton;
                          text="Sky Jump (player)";
                          textSize="16sp";
                          textColor="0xffffffff";

                          id="fon";
                        };

                      };
                      {
                        LinearLayout;
                        layout_height="0.1%h";
                        layout_width="100%w";
                        background="#4EFFFFFF";
                      };

                      {
                        LinearLayout;

                        orientation="horizontal";
                        layout_height="0";
                        layout_width="-1";
                        background="#22FFFFFF";

                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="knock";
                        text="Knock Speed";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="scope";
                        text="Fast Scope";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="carssped";
                        text="Cars Speed (buggy,uaz,dacia)";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="prevent";
                        text="Prevent Jump";
                        textSize="15dp";
                      };
                      {
                        Switch;
                        layout_width="-1";
                        textColor="0xffffffff";
                        id="para";
                        text="Fast Parachute";
                        textSize="15dp";
                      };
                      {
                        TextView;

                      };
                      {
                        TextView;

                      };

                    };
                  };
                };
              };
            };
          };
        };
      };
    };
  };








  function Waterdropanimation(Controls,time)
    import "android.animation.ObjectAnimator"
    ObjectAnimator().ofFloat(Controls,"scaleX",{1,.8,1.3,.9,1}).setDuration(time).start()
    ObjectAnimator().ofFloat(Controls,"scaleY",{1,.8,1.3,.9,1}).setDuration(time).start()
  end

import "android.graphics.PixelFormat"
TextFloat=activity.getSystemService(Context.WINDOW_SERVICE)
HasFocus=false
WmHz99 =WindowManager.LayoutParams()
if Build.VERSION.SDK_INT >= 21 then WmHz99.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
 else WmHz99.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
end

import "android.graphics.PixelFormat"
WmHz99.format =PixelFormat.RGBA_8888
WmHz99.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
WmHz99.gravity = Gravity.LEFT| Gravity.TOP
WmHz99.x = 3
WmHz99.y = 15
WmHz99.width = WindowManager.LayoutParams.WRAP_CONTENT
WmHz99.height = WindowManager.LayoutParams.WRAP_CONTENT
minWindow99 = loadlayout(floattext)


  
LayoutVIP=activity.getSystemService(Context.WINDOW_SERVICE)
HasFocus=false
WmHz =WindowManager.LayoutParams()
if Build.VERSION.SDK_INT >= 26 then WmHz.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
 else WmHz.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
end
import "android.graphics.PixelFormat"
WmHz.format =PixelFormat.RGBA_8888
WmHz.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
WmHz.gravity = Gravity.LEFT| Gravity.TOP
WmHz.x = 333
WmHz.y = 333
WmHz.width = WindowManager.LayoutParams.WRAP_CONTENT
WmHz.height = WindowManager.LayoutParams.WRAP_CONTENT
mainWindow = loadlayout(XonCeFloating)
minWindow = loadlayout(XonCex)

function changeWindow.onClick()
  if isMax==false then
    isMax=true
    LayoutVIP.removeView(mainWindow)
    LayoutVIP.addView(minWindow,WmHz)
   else
    isMax=false
    LayoutVIP.removeView(minWindow)
    LayoutVIP.addView(mainWindow,WmHz)
  end end
function Win_minWindow.onClick(v)
  if isMax==false then
    isMax=true
    LayoutVIP.removeView(mainWindow)
    LayoutVIP.addView(minWindow,WmHz)
   else
    isMax=false
    LayoutVIP.removeView(minWindow)
    LayoutVIP.addView(mainWindow,WmHz)
  end end

function Win_minWindow.OnTouchListener(v,event)
  if event.getAction()==MotionEvent.ACTION_DOWN then
    firstX=event.getRawX()
    firstY=event.getRawY()
    wmX=WmHz.x
    wmY=WmHz.y
   elseif event.getAction()==MotionEvent.ACTION_MOVE then
    WmHz.x=wmX+(event.getRawX()-firstX)
    WmHz.y=wmY+(event.getRawY()-firstY)
    LayoutVIP.updateViewLayout(minWindow,WmHz)
   elseif event.getAction()==MotionEvent.ACTION_UP then
  end return false end

function win_move.OnTouchListener(v,event)
  if event.getAction()==MotionEvent.ACTION_DOWN then
    firstX=event.getRawX()
    firstY=event.getRawY()
    wmX=WmHz.x
    wmY=WmHz.y
   elseif event.getAction()==MotionEvent.ACTION_MOVE then
    WmHz.x=wmX+(event.getRawX()-firstX)
    WmHz.y=wmY+(event.getRawY()-firstY)
    LayoutVIP.updateViewLayout(mainWindow,WmHz)
   elseif event.getAction()==MotionEvent.ACTION_UP then
  end return true end


   import "zip4j"
   function zipnii()
    path1=activity.getLuaDir("libmod.zip")
    dpath2=(activity.getLuaDir(""))
    pass3="161200"
    if zip4j.unZipDir(path1,dpath2,pass3)==true
      then
      os.execute("su -c chmod 777 /data/data/com.android.deadalose/files/libgcloud.so")
      os.execute("su -c chmod 777 /data/data/com.android.deadalose/files/base2")
      os.execute("su -c chmod 777 /data/data/com.android.deadalose/files/base3")
      os.execute("su -c chmod 777 /data/data/com.android.deadalose/files/base")
      TXTTOAST("DONE")
   end
end


  function LoadHoverBall()
    if(Mp==false)then
      zipnii()
      LayoutVIP.addView(minWindow,WmHz)
      TextFloat.addView(minWindow99,WmHz99)
      Mp = true
    end
  end


  function LoadHoverWindow()
    LayoutVIP.addView(mainWindow,WmHz)
    Ml = true
  end

  function changeWindow.onClick()
    if(Ml==true)then
      LayoutVIP.removeView(mainWindow)
      LoadHoverBall()
      Ml = false
    end
  end


  Ml=false
  function Win_minWindow.onClick
    if(Ml==false)then   
      LoadHoverWindow()
    end
  end

  Mp=false
  function start.onClick()

    if (Mp==false) then

      LoadHoverBall()
    end
  end


  function stop.onClick()
    if(Mp==true)then
      LayoutVIP.removeView(minWindow)
      TextFloat.removeView(minWindow99)
      os.execute("rm -rf /data/data/com.android.deadalose/files/libgcloud.so")
      os.execute("rm -rf /data/data/com.android.deadalose/files/base2")
      os.execute("rm -rf /data/data/com.android.deadalose/files/base3")
      os.execute("rm -rf /data/data/com.android.deadalose/files/base")
      os.execute("rm -rf /data/data/com.android.deadalose/files/base4")
      os.execute("rm -rf /data/data/com.android.deadalose/files/libtersafe.so")
      os.execute("rm -rf /data/data/com.android.deadalose/files/libUE4.so")
      Mp = false
    end
  end

  function Win_minWindow.OnTouchListener(v,event)
  if event.getAction()==MotionEvent.ACTION_DOWN then
    firstX=event.getRawX()
    firstY=event.getRawY()
    wmX=WmHz.x
    wmY=WmHz.y
   elseif event.getAction()==MotionEvent.ACTION_MOVE then
    WmHz.x=wmX+(event.getRawX()-firstX)
    WmHz.y=wmY+(event.getRawY()-firstY)
    LayoutVIP.updateViewLayout(minWindow,WmHz)
   elseif event.getAction()==MotionEvent.ACTION_UP then
  end return false end



function game.onClick()
  Waterdropanimation(game,20)
   if global.checked then
      this.startActivity(activity.getPackageManager().getLaunchIntentForPackage("com.tencent.ig"));
   elseif korea.checked then
      this.startActivity(activity.getPackageManager().getLaunchIntentForPackage("com.pubg.krmobile"));
  elseif vietnam.checked then
     this.startActivity(activity.getPackageManager().getLaunchIntentForPackage("com.vng.pubgmobile"));
  elseif taiwan.checked then
      this.startActivity(activity.getPackageManager().getLaunchIntentForPackage("com.rekoo.pubgm"));
   else
      print("Please Select One Version !!!")
    end
  end



function 时间()
  hb()
end

function hb(十二)
  jamsuk.setText(os.date(" Loader V1.3 | %H:%M:%S  "))
end

function 刷新()
  require("import")
  while true do
    Thread.sleep(100)
    call("时间")
  end
end
thread(刷新)

view=jamsuk
color1 = 0xffFF8080;
color2 = 0xff8080FF;
color3 = 0xff80ffff;
color4 = 0xff80ff80;
import "android.animation.ObjectAnimator"
import "android.animation.ArgbEvaluator"
import "android.animation.ValueAnimator"
import "android.graphics.Color"
colorAnim = ObjectAnimator.ofInt(view,"textColor",{color1, color2, color3,color4})
colorAnim.setDuration(3000)
colorAnim.setEvaluator(ArgbEvaluator())
colorAnim.setRepeatCount(ValueAnimator.INFINITE)
colorAnim.setRepeatMode(ValueAnimator.REVERSE)
colorAnim.start()

view=logo
color1 = 0xffFF8080;
color2 = 0xff8080FF;
color3 = 0xff80ffff;
color4 = 0xff80ff80;
import "android.animation.ObjectAnimator"
import "android.animation.ArgbEvaluator"
import "android.animation.ValueAnimator"
import "android.graphics.Color"
colorAnim = ObjectAnimator.ofInt(view,"textColor",{color1, color2, color3,color4})
colorAnim.setDuration(3000)
colorAnim.setEvaluator(ArgbEvaluator())
colorAnim.setRepeatCount(ValueAnimator.INFINITE)
colorAnim.setRepeatMode(ValueAnimator.REVERSE)
colorAnim.start()


  --Flying player
  fon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  foff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
  function fon.onClick()
    if OpenA==false then
      fon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      foff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));

      LayoutVIP2.addView(minWindow2,WmHz2)
      OpenA=true
    end
  end



  function foff.onClick()
    if OpenA==true then
      foff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      fon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));

      LayoutVIP2.removeView(minWindow2)
      OpenA=false
    end
  end

  LayoutVIP2=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  WmHz2 =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then WmHz2.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else WmHz2.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  WmHz2.format =PixelFormat.RGBA_8888
  WmHz2.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  WmHz2.gravity = Gravity.LEFT| Gravity.TOP
  WmHz2.x = 200
  WmHz2.y = 0
  WmHz2.width = WindowManager.LayoutParams.WRAP_CONTENT
  WmHz2.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow2 = loadlayout(XonCe4)
  OpenA=false


  function Win_minWindow2.onClick(v)
    if OpenA==false then
      OpenA=true
      LayoutVIP2.addView(minWindow2,WmHz2)
     else
      OpenA=false
      LayoutVIP2.removeView(minWindow2)
    end
  end

  function Win_minWindow2.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz2.x
      wmY=WmHz2.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz2.x=wmX+(event.getRawX()-firstX)
      WmHz2.y=wmY+(event.getRawY()-firstY)
      LayoutVIP2.updateViewLayout(minWindow2,WmHz2)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  function Win_minWindow3.onClick(v)
    if OpenA==false then
      OpenA=true
      LayoutVIP2.addView(minWindow3,WmHz2)
     else
      OpenA=false
      LayoutVIP2.removeView(minWindow2)
    end end

  function Win_minWindow3.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz2.x
      wmY=WmHz2.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz2.x=wmX+(event.getRawX()-firstX)
      WmHz2.y=wmY+(event.getRawY()-firstY)
      LayoutVIP2.updateViewLayout(minWindow2,WmHz2)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end


  --Jump all cars
  con.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  coff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))

  function con.onClick()
    if OpenB==false then
      con.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      coff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      LayoutVIP3.addView(minWindow4,WmHz3)
      OpenB=true
    end
  end

  function coff.onClick()
    if OpenB==true then
      coff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      con.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      LayoutVIP3.removeView(minWindow4)
      OpenB=false
    end
  end

global.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
function global.OnCheckedChangeListener()
  if global.Checked then
    global.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
   else
    global.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
  end
end

korea.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
function korea.OnCheckedChangeListener()
  if korea.Checked then
    korea.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
   else
    korea.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
  end
end

vietnam.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
function vietnam.OnCheckedChangeListener()
  if vietnam.Checked then
    vietnam.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
   else
    vietnam.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
  end
end

taiwan.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
function taiwan.OnCheckedChangeListener()
  if taiwan.Checked then
    taiwan.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
   else
    taiwan.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFC0C0C0,PorterDuff.Mode.SRC_ATOP));
  end
end



  LayoutVIP3=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  WmHz3 =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then WmHz3.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else WmHz3.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  WmHz3.format =PixelFormat.RGBA_8888
  WmHz3.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  WmHz3.gravity = Gravity.LEFT| Gravity.TOP
  WmHz3.x = 0
  WmHz3.y = 0
  WmHz3.width = WindowManager.LayoutParams.WRAP_CONTENT
  WmHz3.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow4 = loadlayout(XonCe2)
  OpenB=false


  function Win_minWindow4.onClick(v)
    if OpenB==false then
      OpenB=true
      LayoutVIP3.addView(minWindow4,WmHz3)
     else
      OpenB=false
      LayoutVIP3.removeView(minWindow4)
    end
  end

  function Win_minWindow4.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz3.x
      wmY=WmHz3.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz3.x=wmX+(event.getRawX()-firstX)
      WmHz3.y=wmY+(event.getRawY()-firstY)
      LayoutVIP3.updateViewLayout(minWindow4,WmHz3)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  function Win_minWindow5.onClick(v)
    if OpenB==false then
      OpenB=true
      LayoutVIP3.addView(minWindow4,WmHz3)
     else
      OpenB=false
      LayoutVIP3.removeView(minWindow4)
    end end

  function Win_minWindow5.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz3.x
      wmY=WmHz3.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz3.x=wmX+(event.getRawX()-firstX)
      WmHz3.y=wmY+(event.getRawY()-firstY)
      LayoutVIP3.updateViewLayout(minWindow4,WmHz3)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end


  ----Speedhack v1
  spedv1.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  spedv1.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function spedv1.onClick()
    if OpenC==false then
      spedv1.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      spedv1.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      LayoutVIP4.addView(minWindow5,WmHz4)
      OpenC=true
     else
      spedv1.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      spedv1.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      LayoutVIP4.removeView(minWindow5)
      OpenC=false
    end
  end





  LayoutVIP4=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  WmHz4 =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then WmHz4.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else WmHz4.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  WmHz4.format =PixelFormat.RGBA_8888
  WmHz4.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  WmHz4.gravity = Gravity.LEFT| Gravity.TOP
  WmHz4.x = 150
  WmHz4.y = 0
  WmHz4.width = WindowManager.LayoutParams.WRAP_CONTENT
  WmHz4.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow5 = loadlayout(XonCe3)
  OpenC=false


  function Win_minWindow6.onClick(v)
    if OpenC==false then
      OpenC=true
      LayoutVIP4.addView(minWindow5,WmHz4)
     else
      OpenC=false
      LayoutVIP4.removeView(minWindow5)
    end
  end

  function Win_minWindow6.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz4.x
      wmY=WmHz4.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz4.x=wmX+(event.getRawX()-firstX)
      WmHz4.y=wmY+(event.getRawY()-firstY)
      LayoutVIP4.updateViewLayout(minWindow5,WmHz4)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  function Win_minWindow7.onClick(v)
    if OpenC==false then
      OpenC=true
      LayoutVIP4.addView(minWindow5,WmHz4)
     else
      OpenC=false
      LayoutVIP4.removeView(minWindow5)
    end end

  function Win_minWindow7.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz4.x
      wmY=WmHz4.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz4.x=wmX+(event.getRawX()-firstX)
      WmHz4.y=wmY+(event.getRawY()-firstY)
      LayoutVIP4.updateViewLayout(minWindow5,WmHz4)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  ----Speedhack v2

  spedv2.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  spedv2.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function spedv2.onClick()
    if OpenD==false then
      spedv2.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      spedv2.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      LayoutVIP8.addView(minWindow10,WmHz8)
      OpenD=true
     else
      spedv2.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      spedv2.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))

      LayoutVIP8.removeView(minWindow10)
      OpenD=false
    end
  end




  LayoutVIP8=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  WmHz8 =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then WmHz8.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else WmHz8.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  WmHz8.format =PixelFormat.RGBA_8888
  WmHz8.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  WmHz8.gravity = Gravity.LEFT| Gravity.TOP
  WmHz8.x = 200
  WmHz8.y = 0
  WmHz8.width = WindowManager.LayoutParams.WRAP_CONTENT
  WmHz8.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow10 = loadlayout(D42)
  OpenD=false


  function Win_minWindow9.onClick(v)
    if OpenD==false then
      OpenD=true
      LayoutVIP8.addView(minWindow10,WmHz8)
     else
      OpenD=false
      LayoutVIP8.removeView(minWindow10)
    end
  end

  function Win_minWindow9.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz8.x
      wmY=WmHz8.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz8.x=wmX+(event.getRawX()-firstX)
      WmHz8.y=wmY+(event.getRawY()-firstY)
      LayoutVIP8.updateViewLayout(minWindow10,WmHz8)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  function Win_minWindow11.onClick(v)
    if OpenD==false then
      OpenD=true
      LayoutVIP8.addView(minWindow10,WmHz8)
     else
      OpenD=false
      LayoutVIP8.removeView(minWindow10)
    end end

  function Win_minWindow11.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=WmHz8.x
      wmY=WmHz8.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      WmHz8.x=wmX+(event.getRawX()-firstX)
      WmHz8.y=wmY+(event.getRawY()-firstY)
      LayoutVIP8.updateViewLayout(minWindow10,WmHz8)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end return false end

  LayoutVIP18 = activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus = false
  WmHz7 = WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then
    WmHz7.type = WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else
    WmHz7.type = WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  WmHz7.format = PixelFormat.RGBA_8888
  WmHz7.flags = WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  WmHz7.gravity = Gravity.LEFT | Gravity.TOP
  WmHz7.x = 165
  WmHz7.y = 0
  WmHz7.width = WindowManager.LayoutParams.WRAP_CONTENT
  WmHz7.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow17 = loadlayout(minlay5)
  isMaxZ=true
  function Win_minWindow207.onClick()
    if isMaxZ == false then
      isMaxZ = true
      LayoutVIP18.addView(minWindow17, WmHz7)
     else
      isMaxZ = false
      LayoutVIP18.removeView(minWindow17)
    end
  end
  function Win_minWindow207.OnTouchListener(v,event)
    if event.getAction() == MotionEvent.ACTION_DOWN then
      firstX = event.getRawX()
      firstY = event.getRawY()
      wmX = WmHz7.x
      wmY = WmHz7.y
     elseif event.getAction() == MotionEvent.ACTION_MOVE then
      WmHz7.x = wmX + (event.getRawX() - firstX)
      WmHz7.y = wmY + (event.getRawY() - firstY)
      LayoutVIP18.updateViewLayout(minWindow17, WmHz7)
     elseif event.getAction() == MotionEvent.ACTION_UP then
    end
    return false
  end
  function Win_minWindow20.onClick()
    if isMaxZ == false then
      isMaxZ = true
      LayoutVIP18.addView(minWindow17, WmHz7)
     else
      LayoutVIP18.removeView(minWindow17)
    end
  end

  function Win_minWindow20.OnTouchListener(v,event)
    if event.getAction() == MotionEvent.ACTION_DOWN then
      firstX = event.getRawX()
      firstY = event.getRawY()
      wmX = WmHz7.x
      wmY = WmHz7.y
     elseif event.getAction() == MotionEvent.ACTION_MOVE then
      WmHz7.x = wmX + (event.getRawX() - firstX)
      WmHz7.y = wmY + (event.getRawY() - firstY)
      LayoutVIP18.updateViewLayout(minWindow17, WmHz7)
     elseif event.getAction() == MotionEvent.ACTION_UP then
    end
    return false
  end
  spedv3.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  spedv3.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))

  function spedv3.onClick()
    if spedv3.checked then
      LayoutVIP18.addView(minWindow17, WmHz7)
      spedv3.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      spedv3.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
     else
      LayoutVIP18.removeView(minWindow17)
      spedv3.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      spedv3.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
    end
  end


  tickexit=0
  function onKeyDown(code,event)
    if string.find(tostring(event),"KEYCODE_BACK") ~= nil then
      if tickexit+3 > tonumber(os.time()) then
        activity.finish()
       else
        TXTTOAST("Press back again to exit app")
        tickexit=tonumber(os.time())
      end
      return true
    end
  end

  if Settings.canDrawOverlays(activity) then
   else
    dialog=AlertDialog.Builder(this)
    .setTitle("Floating windows are not allowed,\nplease give floating window permission!")
    .setCancelable(false)
    .setPositiveButton("Allow",
    {onClick=function(v)
        intent=Intent("android.settings.action.MANAGE_OVERLAY_PERMISSION");
        intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
        os.exit()
      end})
    .show()
  end


  function CircleButton(view,InsideColor,radiu,InsideColor1)
    import "android.graphics.drawable.GradientDrawable"
    drawable = GradientDrawable()
    drawable.setShape(GradientDrawable.RECTANGLE)
    drawable.setCornerRadii({radiu, radiu, radiu, radiu, radiu, radiu, radiu, radiu})
    drawable.setColor(InsideColor)
    drawable.setStroke(1, InsideColor1)
    view.setBackgroundDrawable(drawable)
  end




CircleButton(win_mainview,0x91000000,8,0xFF0090FF)
CircleButton(onee,0x91000000,8,0xFF0090FF)



  CircleButton(menu1,0x60FFFFFF,0,0x20FFFFFF)
  pg.showPage(0)
  menu1.onClick=function()
    pg.showPage(0)
    CircleButton(menu1,0x60FFFFFF,0,0x20FFFFFF)
    CircleButton(menu2,0x00000000,0,0x00000000)
    CircleButton(menu3,0x00000000,0,0x00000000)
  end
  menu2.onClick=function()
    pg.showPage(1)
    CircleButton(menu2,0x60FFFFFF,0,0x20FFFFFF)
    CircleButton(menu1,0x00000000,0,0x00000000)
    CircleButton(menu3,0x00000000,0,0x00000000)
    
  end
  menu3.onClick=function()
    pg.showPage(2)
    CircleButton(menu3,0x60FFFFFF,0,0x20FFFFFF)
    CircleButton(menu2,0x00000000,0,0x00000000)
    CircleButton(menu1,0x00000000,0,0x00000000)
    
  end
  

  --
  pg.addOnPageChangeListener{
    onPageScrolled=function(a,b,c)
    end,
    onPageSelected=function(page)
      if page==0 then
        CircleButton(menu1,0x60FFFFFF,0,0x20FFFFFF)
        CircleButton(menu2,0x00000000,0,0x00000000)
        CircleButton(menu3,0x00000000,0,0x00000000)
        

      end
      if page==1 then
        CircleButton(menu2,0x60FFFFFF,0,0x20FFFFFF)
        CircleButton(menu1,0x00000000,0,0x00000000)
        CircleButton(menu3,0x00000000,0,0x00000000)
        

      end
      if page==2 then
        CircleButton(menu3,0x60FFFFFF,0,0x20FFFFFF)
        CircleButton(menu2,0x00000000,0,0x00000000)
        CircleButton(menu1,0x00000000,0,0x00000000)
        

      end
      if page==3 then
        CircleButton(menu3,0x00000000,0,0x00000000)
        CircleButton(menu2,0x00000000,0,0x00000000)
        CircleButton(menu1,0x00000000,0,0x00000000)
        

      end

    end,
    onPageScrollStateChanged=function(state)
    end,}






  import "android.graphics.Typeface"

  logo.setTypeface(Typeface.DEFAULT_BOLD)


  --[[function D4pubgm(iANYING)
  D4=activity.getLuaDir(iANYING)
  os.execute("su -c chmod 777"..D4)
  Runtime.getRuntime().exec("su -c"..D4)
end

]]
  --Jump cars off
  import "android.text.method.HideReturnsTransformationMethod"
  Win_minWindow5.setVisibility(View.GONE)
  function Win_minWindow5.onClick()
    Win_minWindow5.setVisibility(View.GONE)
    Win_minWindow4.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA58") --Jump Cars
    TXTTOAST("CARS FLY OF")
    os.remove(activity.getLuaDir("base BIMA58"))
  end


  --jump cars on
  function Win_minWindow4.onClick()
    Win_minWindow5.setVisibility(View.VISIBLE)
    Win_minWindow4.setVisibility(View.GONE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA57") --Jump Cars
    TXTTOAST("CARS FLY ON")
    os.remove(activity.getLuaDir("base BIMA57"))
  end

  --flying player on
  function Win_minWindow2.onClick()
    Win_minWindow3.setVisibility(View.VISIBLE)
    Win_minWindow2.setVisibility(View.GONE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA59")
    TXTTOAST("PLAYER FLY ON")
    os.remove(activity.getLuaDir("base BIMA59"))
  end

  --flying player off
  import "android.text.method.HideReturnsTransformationMethod"
  Win_minWindow3.setVisibility(View.GONE)
  function Win_minWindow3.onClick()
    Win_minWindow3.setVisibility(View.GONE)
    Win_minWindow2.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA60")
    TXTTOAST("PLAYER FLY OFF")
    os.remove(activity.getLuaDir("base BIMA60"))
  end





  --speed hack on v1
  function Win_minWindow6.onClick()
    Win_minWindow7.setVisibility(View.VISIBLE)
    Win_minWindow6.setVisibility(View.GONE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA49")
    TXTTOAST("Flash V1 ON")
    os.remove(activity.getLuaDir("base BIMA47"))
  end


  --speedhack off v1
  import "android.text.method.HideReturnsTransformationMethod"
  Win_minWindow7.setVisibility(View.GONE)
  function Win_minWindow7.onClick()
    Win_minWindow7.setVisibility(View.GONE)
    Win_minWindow6.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA50")
    os.remove(activity.getLuaDir("base BIMA48"))
    TXTTOAST("Flash V1 OFF")
  end

  --speed hack on v2
  function Win_minWindow9.onClick()
    Win_minWindow11.setVisibility(View.VISIBLE)
    Win_minWindow9.setVisibility(View.GONE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA49")
    TXTTOAST("Flash V2")
    os.remove(activity.getLuaDir("base BIMA49"))
  end


  --speedhack off v2
  import "android.text.method.HideReturnsTransformationMethod"
  Win_minWindow11.setVisibility(View.GONE)
  function Win_minWindow11.onClick()
    Win_minWindow11.setVisibility(View.GONE)
    Win_minWindow9.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA50")
    os.remove(activity.getLuaDir("base BIMA50"))
  end


  function Win_minWindow207.onClick()
    Win_minWindow207.setVisibility(View.GONE)
    Win_minWindow20.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA51")
    TXTTOAST("Flash V3 ON")
    os.remove(activity.getLuaDir("base BIMA51"))
  end



  --speedhack off v3
  import "android.text.method.HideReturnsTransformationMethod"
  Win_minWindow20.setVisibility(View.GONE)
  function Win_minWindow20.onClick()
    Win_minWindow20.setVisibility(View.GONE)
    Win_minWindow207.setVisibility(View.VISIBLE)
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA52")
    TXTTOAST("Flash V3 OFF")
    os.remove(activity.getLuaDir("base BIMA52"))
  end


  fixstuck.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  function fixstuck.OnCheckedChangeListener()
    if fixstuck.checked then
      fixstuck.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA53")
      os.remove(activity.getLuaDir("base BIMA53"))
     else
      fixstuck.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA54")
      os.remove(activity.getLuaDir("base BIMA54"))
    end
  end

  fixstuck2.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  function fixstuck2.OnCheckedChangeListener()
    if fixstuck2.checked then
      fixstuck2.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA55")
      os.remove(activity.getLuaDir("base BIMA55"))
     else
      fixstuck2.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA56")
      os.remove(activity.getLuaDir("base BIMA56"))
    end
  end





  knock.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  knock.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function knock.OnCheckedChangeListener()
    if knock.checked then
      knock.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      knock.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA61")
      os.remove(activity.getLuaDir("base BIMA61"))
     else
      knock.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      knock.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA62")
      os.remove(activity.getLuaDir("base BIMA62"))
    end
  end
  scope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  scope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function scope.OnCheckedChangeListener()
    if scope.checked then
      scope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      carssped.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA63")
      os.remove(activity.getLuaDir("base BIMA63"))
     else
      scope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      scope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA64")
      os.remove(activity.getLuaDir("base BIMA64"))
    end
  end


  carssped.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  carssped.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function carssped.OnCheckedChangeListener()
    if carssped.checked then
      carssped.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      carssped.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA65")
      os.remove(activity.getLuaDir("base BIMA65"))
     else
      carssped.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      carssped.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA66")
      os.remove(activity.getLuaDir("base BIMA66"))
    end
  end
  prevent.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  prevent.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function prevent.OnCheckedChangeListener()
    if prevent.checked then
      prevent.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      prevent.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA67")
      os.remove(activity.getLuaDir("base BIMA67"))
     else
      prevent.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      prevent.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA68")
      os.remove(activity.getLuaDir("base BIMA68"))
    end
  end
  para.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  para.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function para.OnCheckedChangeListener()
    if para.checked then
      para.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      para.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA69")
      os.remove(activity.getLuaDir("base BIMA69"))
     else
      para.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      para.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA70")
      os.remove(activity.getLuaDir("base BIMA70"))
    end
  end
  norec.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  norec.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function norec.OnCheckedChangeListener()
    if norec.checked then
      norec.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      norec.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA27")
      os.remove(activity.getLuaDir("base BIMA27"))
     else
      norec.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      norec.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA28")
      os.remove(activity.getLuaDir("base BIMA28"))
    end
  end



  les.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  les.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function les.OnCheckedChangeListener()
    if les.checked then
      les.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      les.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA29")
      os.remove(activity.getLuaDir("base BIMA29"))
     else
      les.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      les.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA30")
      os.remove(activity.getLuaDir("base BIMA30"))
    end
  end



  shake.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  shake.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function shake.OnCheckedChangeListener()
    if shake.checked then
      shake.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      shake.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA31")
      os.remove(activity.getLuaDir("base BIMA31"))
     else
      shake.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      shake.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA32")
      os.remove(activity.getLuaDir("base BIMA32"))
    end
  end



  cros.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  cros.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function cros.OnCheckedChangeListener()
    if cros.checked then
      cros.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      cros.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA33")
      os.remove(activity.getLuaDir("base BIMA33"))
     else
      cros.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      cros.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA34")
      os.remove(activity.getLuaDir("base BIMA34"))
    end
  end




  aim.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  aim.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function aim.OnCheckedChangeListener()
    if aim.checked then
      aim.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      aim.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA35")
      os.remove(activity.getLuaDir("base BIMA35"))
     else
      aim.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      aim.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA36")
      os.remove(activity.getLuaDir("base BIMA36"))
    end
  end


  instaoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
  instaon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  instaon.onClick=function()
    instaon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    instaoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA37")
    os.remove(activity.getLuaDir("base BIMA37"))
  end


  instaoff.onClick=function()
    instaoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    instaon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA38")
    os.remove(activity.getLuaDir("base BIMA38"))
  end

  hsoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
  hson.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  hson.onClick=function()
    hson.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    hsoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA39")
    os.remove(activity.getLuaDir("base BIMA39"))
  end

  hsoff.onClick=function()
    hsoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    hson.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA40")
    os.remove(activity.getLuaDir("base BIMA40"))
  end



  fog.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  fog.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function fog.OnCheckedChangeListener()
    if fog.checked then
      fog.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      fog.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA19")
      os.remove(activity.getLuaDir("base BIMA19"))
     else
      fog.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      fog.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA20")
      os.remove(activity.getLuaDir("base BIMA20"))
    end
  end

  sky.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  sky.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function sky.OnCheckedChangeListener()
    if sky.checked then
      io.open("storage/emulated/0/KONTOL", 'w')
      sky.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      sky.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base2 72")
      os.remove(activity.getLuaDir("base2 72"))
     else
      io.open("storage/emulated/0/KONTOL", 'w')
      sky.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      sky.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base3 26")
      os.remove(activity.getLuaDir("base3 26"))
    end
  end
  sitscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  sitscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function sitscope.OnCheckedChangeListener()
    if sitscope.Checked then
      sitscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      sitscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA41")
      os.remove(activity.getLuaDir("base BIMA41"))
     else
      sitscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      sitscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA42")
      os.remove(activity.getLuaDir("base BIMA42"))
    end
  end


  standscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  standscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function standscope.OnCheckedChangeListener()
    if standscope.Checked then
      standscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      standscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA45")
      TXTTOAST("Stand Scope ")
      os.remove(activity.getLuaDir("base BIMA45"))
     else
      standscope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      standscope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA46")
      os.remove(activity.getLuaDir("base BIMA46"))
    end
  end

  pronescope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
  pronescope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  function pronescope.OnCheckedChangeListener()
    if pronescope.Checked then
      pronescope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
      pronescope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA43")
      TXTTOAST("Prone Scope ")
      os.remove(activity.getLuaDir("base BIMA43"))
     else
      pronescope.ThumbDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
      pronescope.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
      os.execute("su -c /data/data/com.android.deadalose/files/base BIMA44")
      os.remove(activity.getLuaDir("base BIMA44"))
    end
  end

  efexoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
  efexon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  efexon.onClick=function()
    efexon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    efexoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA23")
    os.remove(activity.getLuaDir("base BIMA23"))
  end

  efexoff.onClick=function()
    efexoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    efexon.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA24")
    os.remove(activity.getLuaDir("base BIMA24"))
  end

  nightoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
  nighton.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP))
  nighton.onClick=function()
    nighton.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    nightoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA25")
    os.remove(activity.getLuaDir("base BIMA25"))
  end

  nightoff.onClick=function()
    nightoff.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP));
    nighton.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
    os.execute("su -c /data/data/com.android.deadalose/files/base BIMA26")
    os.remove(activity.getLuaDir("base BIMA26"))
  end

bacod.ProgressDrawable.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
bacod.Thumb.setColorFilter(PorterDuffColorFilter(0xFF0090FF,PorterDuff.Mode.SRC_ATOP))
 bacod.setOnSeekBarChangeListener{
    onProgressChanged=function(view, progress)
      if progress==0 then
        PUBGLITEROOT("lib/libUE4.so 7","Active")
        os.remove(activity.getLuaDir("lib/libUE4.so 7"))
      end
      if progress==1 then
        PUBGLITEROOT("lib/libUE4.so 8","Active")
        os.remove(activity.getLuaDir("lib/libUE4.so 8"))
      end
      if progress==2 then
        PUBGLITEROOT("lib/libUE4.so 9","Active")
        os.remove(activity.getLuaDir("lib/libUE4.so 9"))
      end
      if progress==3 then
        PUBGLITEROOT("lib/libUE4.so 10","Active")
        os.remove(activity.getLuaDir("lib/libUE4.so 10"))
      end
    end
  }
  


txtExpired.setText(EXPIREDLOGIN)
model.setText(""..Build.MODEL)

task(3000,function()
  pstatus.setVisibility(View.GONE)
  status.setVisibility(View.VISIBLE)
  local chec,root=os.execute("su")
  if chec==true then
    status.Text="ROOT";
    status.textColor=0xFF00FF00
   else
    status.Text="NO ROOT";
    status.textColor=0xFFFF0000
  end
end)


end




